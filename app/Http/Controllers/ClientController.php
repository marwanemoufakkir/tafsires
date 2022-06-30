<?php

namespace App\Http\Controllers;

use Elasticsearch\ClientBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use ONGR\ElasticsearchDSL\Query\Compound\BoolQuery;
use ONGR\ElasticsearchDSL\Query\FullText\MatchQuery;
use ONGR\ElasticsearchDSL\Query\FullText\MatchPhraseQuery;
use ONGR\ElasticsearchDSL\Query\Joining\NestedQuery;
use ONGR\ElasticsearchDSL\Query\TermLevel\TermQuery;
use ONGR\ElasticsearchDSL\Highlight\Highlight;
use ONGR\ElasticsearchDSL\Search;
use ONGR\ElasticsearchDSL\Query\Specialized\MoreLikeThisQuery;


class ClientController extends Controller
{

    protected $elasticsearch;

    //Set up our client
    public function __construct()
    {
        $this->elasticsearch = ClientBuilder::create()->build();

    }
    public function elasticsearchQueries(Request $request){
     
        $items=$this->searchOnElasticsearch($request);
        return view('results')->with('result',$this->buildCollection($items))->with('count',$this->getTotal($items));
    }
    public function fetchAyah(Request $request)
    {

        $items = $this->findAyahBysurah($request->surah_id);
        return response()->json($this->buildCollection($items), 200, [], JSON_UNESCAPED_UNICODE);
    }

    private function findAyahBysurah(string $query = ''): array
    {
        $params = [
            'index' => 'my-tafsir',
            'from' => 0,
            'size' => 1000,
            'body' => [
                'query' => [
                    'match' => [
                        'ayah.chapterNumber' => $query,
                    ],
                ],
            ],
        ];
        $items = $this->elasticsearch->search($params);
        return $items;
    }
    public function fetchTopic(Request $request)
    {

        $items = $this->findTopic($request->ayah_id);
        return response()->json($this->buildCollection($items), 200, [], JSON_UNESCAPED_UNICODE);
    }

    private function findTopic(string $query = ''): array
    {
        $params = [
            'index' => 'my-tafsir',
            'body' => [
                'query' => [
                    'match' => [
                        'ayah.ayahNumber' => $query,
                    ],
                ],
            ],
        ];
        $items = $this->elasticsearch->search($params);
        return $items;
    }
    private function findAllTopic(string $query = ''): array
    {
        $params = [
            'index' => 'my-tafsir',
            'body' => [
                'query' => [
                    'match_all' => [
                    ],
                ],
            ],
        ];
        $items = $this->elasticsearch->search($params);
        return $items;
    }

    private function searchOnElasticsearch(Request $request)
    {
        
        // $validator = Validator::make($request->all(), [
        //     'kt_docs_repeater_advanced.*.paraghraphe.text' => 'required',
        // ], $messages = [
        //     'required' => 'أدخل كلمات البحث.',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator);
        // }

        $requestParams = $request->kt_docs_repeater_advanced;

        $search = new Search();

        foreach ($requestParams as $key => $param) {
            $boolQuery = new BoolQuery();
            $nestedBoolQuery = new BoolQuery();
            $param=array_filter($param);
            $searchType=$param['search_type'];
            if(isset($param['type'])){
                $boolOperator=$param['type'];   
            }else{
                $boolOperator='MUST';

            }
            switch ($boolOperator) {
                case 'MUST':
                    $BoolQueryOperator=BoolQuery::FILTER;
                    break;
                case 'SHOULD':
                    $BoolQueryOperator=BoolQuery::SHOULD;
                    break;
                default:
                $BoolQueryOperator=BoolQuery::MUST_NOT;
                    break;
            }

            
            foreach ($param as $key => $field) {
                if($key === 'paraghraphe.text' ){
                    switch ($searchType) {
                        case 'default':
                            $nestedBoolQuery->add(new MatchQuery('paraghraphe.text.rebuilt_arabic', $field), BoolQuery::SHOULD);
                            $nestedQuery = new NestedQuery(
                                'paraghraphe',
                                $nestedBoolQuery
                            );
                            $boolQuery->add($nestedQuery, $BoolQueryOperator);
                            break;
                        case 'exact':
                            $nestedBoolQuery->add(new MatchPhraseQuery('paraghraphe.text', $field), BoolQuery::SHOULD);
                            $nestedQuery = new NestedQuery(
                                'paraghraphe',
                                $nestedBoolQuery
                            );
                            $boolQuery->add($nestedQuery, $BoolQueryOperator);
                            break;
                        case 'synonym':
                            $nestedBoolQuery->add(new MatchQuery('paraghraphe.text.arabic_synonym_normalized', $field), BoolQuery::SHOULD);
                            $nestedQuery = new NestedQuery(
                                'paraghraphe',
                                $nestedBoolQuery
                            );
                            $boolQuery->add($nestedQuery, $BoolQueryOperator);
                            break;
                        default:
                            $moreLikeThisQuery = new MoreLikeThisQuery(
                                $field,
                                [
                                    'fields' => ['paraghraphe.text.arabic_synonym_normalized'],
                                    'min_term_freq' => 1,
                                    'max_query_terms' => 12,
                                ]
                            );
                            
                            $nestedBoolQuery->add($moreLikeThisQuery, BoolQuery::SHOULD);
                            $nestedQuery = new NestedQuery(
                                'paraghraphe',
                                $nestedBoolQuery
                            );
                            $boolQuery->add($nestedQuery, $BoolQueryOperator);
                            break;
                    }

                }
                elseif ($key === 'paraghraphe.topic' || $key === 'paraghraphe.subtopic') {
                    $nestedBoolQuery->add(new MatchQuery($key, $field), BoolQuery::SHOULD);
                    $nestedQuery = new NestedQuery(
                        'paraghraphe',
                        $nestedBoolQuery
                    );
                    $boolQuery->add($nestedQuery, $BoolQueryOperator);
                } elseif($key!='search_type' AND $key!='type') {
                    $boolQuery->add(new MatchQuery($key, $field), $BoolQueryOperator);

                }
            }


            $search->addQuery($boolQuery, BoolQuery::FILTER);
            

            
        }
        $requestFilter = $request->filter;
        if(isset($requestFilter)){
            foreach ($requestFilter as $key => $value) {
            
                if( $key === 'surah'){
                    foreach ($value as $key => $term) {
                        $filter = new TermQuery('ayah.chapterNumber',  $term);
                        $boolQuery->add($filter, BoolQuery::FILTER);
                    }
    
                }
                if( $key === 'topic'){
                    foreach ($value as $key => $term) {
                        $nestedBoolQuery->add(new TermQuery('paraghraphe.topic',  $term));
                        $nestedQuery = new NestedQuery(
                            'paraghraphe',
                            $nestedBoolQuery
                        );
                        $boolQuery->add($nestedQuery, BoolQuery::FILTER);
                    }
    
                }
                if( $key === 'type'){
                    foreach ($value as $key => $term) {
                        $nestedBoolQuery->add(new TermQuery('paraghraphe.type',  $term));
                        $nestedQuery = new NestedQuery(
                            'paraghraphe',
                            $nestedBoolQuery
                        );
                        $boolQuery->add($nestedQuery, BoolQuery::FILTER);
                    }
    
                }
            }
        }


        $higlight = new Highlight();
        $higlight->addField('paraghraphe.text');
        $higlight->addField('paraghraphe.text.arabic_synonym_normalized');
        $higlight->addField('paraghraphe.text.rebuilt_arabic');
        $higlight->setTags(["<a class='ls-2 fw-bolder' style='text-decoration: underline;'>"],["</a>"]);
        $higlight->setFragmentSize(0);
        $higlight->setNumberOfFragments(2);
        $search->addHighlight($higlight);
        $searchParams = [
            'index' => 'my-tafsir',
            'body' => $search->toArray(),
        ];
        // dd($searchParams);

        $items = $this->elasticsearch->search($searchParams);
       
         return $items;
    
        

    }
    private function buildCollection(array $items)
    {
        return $items['hits']['hits'];
    }
    private function getTotal(array $items){
        $count=$items['hits']['total'];
        return $count;
    }

}


