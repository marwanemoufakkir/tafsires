<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use App\Models\Tafsir;
use App\Models\Topic;
use Elasticsearch\Client;
class ParsingFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */


     /** @var \Elasticsearch\Client */
    private $elasticsearch;


    public function __construct(Client $elasticsearch)
    {
        parent::__construct();
        $this->elasticsearch = $elasticsearch;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $params = ['index' => 'my-tafsir'];
          $response = $this->elasticsearch->indices()->delete($params);
        $params = [
            'index' => 'my-tafsir',
            'body' => [

  "settings"=>[
    "analysis"=>[
      "filter"=>[
        "autocomplete"=>[
          "type"=>"edge_ngram",
          "min_gram"=>1,
          "max_gram"=>30
        ],
        "arabic_stop"=>[
          "type"=>"stop",
          "stopwords"=>"_arabic_"
        ],
        "arabic_keywords"=>[
          "type"=>"keyword_marker",
          "keywords"=>[
            "ياسين",
            "موسي",
            "عيسي",
            "يوسف",
            "ابراهيم",
            "اسماعيل",
            "نوح"
          ]
        ],
        "arabic_stemmer"=>[
          "type"=>"stemmer",
          "language"=>"arabic"
        ]
      ],
      "analyzer"=>[
        "autocomplete_arabic"=>[
          "type"=>"custom",
          "tokenizer"=>"whitespace",
          "filter"=>[
            "arabic_normalization",
            "autocomplete",
            "arabic_keywords"
          ]
        ],
        "rebuilt_arabic"=>[
          "tokenizer"=>"standard",
          "filter"=>[
            "lowercase",
            "decimal_digit",
            "arabic_stop",
            "arabic_normalization",
            "arabic_keywords",
            "arabic_stemmer"
          ]
        ],
        "arabic_synonym_normalized"=>[
          "tokenizer"=>"icu_tokenizer",
          "filter"=>[
            "arabic_keywords",
            "arabic_normalization",
            "arabic_stemmer",
            "arabic_stop",
            "icu_folding"
          ]
        ]
      ]
    ]
  ],
  "mappings"=>[
    "properties"=>[
      "ayah"=>[
        "type"=>"object",
        "properties"=>[
          "chapterNumber"=>[
            "type"=>"keyword"
          ],
          "ayahNumber"=>[
            "type"=>"keyword"
          ],
          "title"=>[
            "type"=>"text",
            "analyzer"=>"autocomplete_arabic"
          ]
        ]
      ],
      "content"=>[
        "type"=>"text",
        "analyzer"=>"arabic_synonym_normalized"
      ],
      "paraghraphe"=>[
        "type"=>"nested",
        "properties"=>[
          "text"=>[
            "type"=>"text",
              "fields"=>[
                "rebuilt_arabic"=>[
                  "type"=>"text",
                  "analyzer"=>"rebuilt_arabic"
                ],
                "arabic_synonym_normalized"=>[
                  "type"=>"text",
                  "analyzer"=>"arabic_synonym_normalized"
                ],
                "autocomplete_arabic"=>[
                  "type"=>"text",
                  "analyzer"=>"autocomplete_arabic"
                ]
              ]
          ],
          "type"=>[
            "type"=>"text"
          ],
          "topic"=>[
            "type"=>"text"
          ],
          "subtopic"=>[
            "type"=>"nested",
            "properties"=>[
              "text"=>[
                "type"=>"text"
              ],
              "subtopics"=>[
                "type"=>"text"
              ]
            ]
          ]
        ]
      ]
    ]
  ]

            ]
        ];


        // Create the index with mappings and settings now
        $response = $this->elasticsearch->indices()->create($params);
        $this->info('Indexing all sections. This might take a while...');
        
        foreach ($this->getText() as $key => $value) {
            $this->elasticsearch->index([
           	   'index' => 'my-tafsir',
                   'type' => '_doc',
                   'id'=>$key,
                   'body'=> $value
             ]);

            // PHPUnit-style feedback
            $this->output->write('.');
        }

        $this->info("\nDone!");

    }
    protected function getText(){
        $doc = new \DOMDocument;
        $files = glob("Tabari_komplett_komplett.xml");
        $sections = array();
        $listTopicsDB=array();
        if (is_array($files)) {   
            foreach($files as $filename) {
                $doc->load($filename);
                $xpath = new \DOMXPath($doc);
                $xpath->registerNamespace("tei", "http://www.tei-c.org/ns/1.0");

                $query = "//tei:div[@type='section']";
                
                $elements = $xpath->query($query);
                foreach ($elements  as $key => $element) {
                    $chapters = array();
                    $topicList=array();
                    
                    $ayahs = $xpath->query("./tei:head/tei:quote", $element);
                    $topics = $xpath->query("./tei:p", $element);
                    
                    foreach ($ayahs as $value) {
                        $number = $value->getattribute("n");
                        $title = $value->nodeValue;
                        $chapters = array("chapterNumber"=>explode(":", $number)[0],"ayahNumber" => $number, "title" => $title);
                    }
                    foreach ($topics  as $key => $topic) {
                        
                        $type = $topic->getattribute("n");
                        $list = $topic->getattribute("ana");
                        $listExplode = explode(' ' ,$list);
                        foreach ($listExplode as $key => $value) {
                          # code...
                          if (!in_array($value, $listTopicsDB))
                          {
                            $listTopicsDB[]=$value;
                          }
                        }
                        $subtopics = $xpath->query("./tei:seg", $topic);
                        $subtopicList=array();
                        foreach ($subtopics as $key => $value) {
                            $analist = $value->getattribute("ana");
                            $subtopicList[] = array("text"=>$value->nodeValue,'subtopics' => $analist);
                        }
                        $topicList[] = array("xml_text"=> $doc->saveHTML($topic),"text"=>$topic->nodeValue,"type"=> $type,'topic' => $list,'subtopic' => $subtopicList);
                    }
                    $section = array();
                    $section["ayah"] = $chapters;
                    $section["content"] = $element->nodeValue;
                    $section["paraghraphe"]=$topicList;
                    $sections[]=$section;
                    
                    // dd($listTopicsDB);

                }
                // foreach ($listTopicsDB as $key => $value) {
                //   $topic = Topic::create([
                //     'name' => $value,
                // ]);
                // foreach ($listTopicsDB as $key => $value) {
                //   $topic = Topic::create([
                //     'name' => $value,
                // ]);
                // }
                $json = preg_replace('/(\s+)?\\\t(\s+)?/', ' ', json_encode($sections, JSON_UNESCAPED_UNICODE));
                $json = preg_replace('/(\s+)?\\\n(\s+)?/', ' ',$json);

            }

            }
            // dd('done');
            return  json_decode($json);
        }
    }
