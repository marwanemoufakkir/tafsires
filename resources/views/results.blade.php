<!DOCTYPE html>

<html direction="rtl" dir="rtl" style="direction: rtl">
	<!--begin::Head-->
	    <head><base href="../../">
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="assets/plugins/global/plugins.bundle.rtl.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.rtl.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<style>

			.select2-container--bootstrap5 .select2-selection--single .select2-selection__rendered {
				display: block;
				padding-left: 0;
				padding-right: 0;
				overflow: hidden;
				text-overflow: ellipsis;
				/* font-weight: 900; */
				white-space: nowrap;
				color: black;
			}
		</style>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-enabled sidebar-enabled">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-column flex-column-fluid">
				<!--begin::Header-->
				<div id="kt_header" class="header align-items-stretch">
					<!--begin::Container-->
					<div class="container-xxl d-flex align-items-stretch justify-content-between">
						<!--begin::Brand-->
						<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 w-lg-225px me-5">
							<!--begin::Aside mobile toggle-->
							<div class="btn btn-icon btn-active-icon-primary ms-n2 me-2 d-flex d-lg-none" id="kt_aside_toggle">
								<!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
								<span class="svg-icon svg-icon-1">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
										<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
									</svg>
								</span>
								<!--end::Svg Icon-->
							</div>
							<!--end::Aside mobile toggle-->
							<!--begin::Logo-->
							<a href="../../demo5/dist/index.html">
								<img alt="Logo" src="assets/media/logos/logo-demo5.svg" class="d-none d-lg-inline h-30px" />
								<img alt="Logo" src="assets/media/logos/logo-demo5-mobile.svg" class="d-lg-none h-25px" />
							</a>
							<!--end::Logo-->
						</div>
						<!--end::Brand-->
                        						<!--begin::Wrapper-->
						<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
							<!--begin::Navbar-->
							<div class="d-flex align-items-stretch" id="kt_header_nav">
								<!--begin::Menu wrapper-->
								<div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
									<!--begin::Menu-->
									<div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch" id="#kt_header_menu" data-kt-menu="true">
										<div class="menu-item me-lg-1">
											<a class="menu-link   py-3" href="#">
												<span class="menu-title">Home</span>
											</a>
										</div>
                                        <div class="menu-item me-lg-1">
											<a class="menu-link  active py-3" href="{{'/search'}}">
												<span class="menu-title">Browse</span>
											</a>
										</div>
                                        <div class="menu-item me-lg-1">
											<a class="menu-link  py-3" href="#">
												<span class="menu-title">About</span>
											</a>
										</div>
									</div>
									<!--end::Menu-->
								</div>
								<!--end::Menu wrapper-->
							</div>
							<!--end::Navbar-->

						</div>
						<!--end::Wrapper-->

					</div>
	
					</div>
					<!--end::Container-->
				</div>
				<!--end::Header-->
				<!--begin::Container-->
				<div id="kt_content_container" class="d-flex flex-column-fluid align-items-stretch container-xxl">
					<!--begin::Aside-->
					<div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '225px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle" data-kt-sticky="true" data-kt-sticky-name="aside-sticky" data-kt-sticky-offset="{default: false, lg: '1px'}" data-kt-sticky-width="{lg: '225px'}" data-kt-sticky-left="auto" data-kt-sticky-top="94px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
						<!--begin::Aside nav-->
						<div class="hover-scroll-overlay-y my-5 my-lg-5 w-100 ps-4 ps-lg-0 pe-4 me-1" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_header" data-kt-scroll-wrappers="#kt_aside" data-kt-scroll-offset="5px">
                                <!--begin::Form-->
										<form  method="get" action="/result" enctype="multipart/form-data">
                                            @foreach ( Request::get('kt_docs_repeater_advanced') as $index => $param)
                                                @foreach ($param as $key => $field)
                                                <input name="kt_docs_repeater_advanced[{{$index}}][{{$key}}]" type="text" value="{{$field}}" hidden> 
                                                @endforeach
                                            @endforeach
                                           
                                            <!--begin::Input group-->
                                            <div class="mb-5">
                                                <label class="fs-6 form-label fw-bolder text-dark">سورة  Surah</label>
                                               
                                                <div class="scroll h-200px pt-2">
                                                    @foreach (\App\Models\Surah::get() as $surah)
                                                <!--begin::Checkbox-->
                                                <div class="form-check form-check-custom form-check-solid mb-5">
                                                    <input class="form-check-input" type="checkbox" value="{{ $surah->id}}"  name="filter[surah][]"  />
                                                    <label class="form-check-label flex-grow-1 fw-bold text-gray-700 fs-6" for="type">{!! str_replace('سورة', ' ', $surah->arabic) !!} - {{ $surah->latin }}</label>
                                                </div>
                                                <!--end::Checkbox-->
                                                @endforeach
                                                </div>
                                                
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Input group-->
                                            <div class="mb-5">
                                                <label class="fs-6 form-label fw-bolder text-dark">موضوع Topic</label>
                                                
                                               
                                                <div class="scroll h-200px pt-2">
                                                @foreach (\App\Models\Topic::get() as $topic)
													@if (!empty($topic->name))
													<!--begin::Checkbox-->
													<div class="form-check form-check-custom form-check-solid mb-5">
														<input class="form-check-input" type="checkbox" value="{{ $topic->name}}"  name="filter[topic][]" />
														<label class="form-check-label flex-grow-1 fw-bold text-gray-700 fs-6" for="type">{{ $topic->name }}</label>
													</div>
													<!--end::Checkbox-->	
													@endif

                                                @endforeach
                                                </div>
                                                
                                            </div>
                                            <!--begin::Input group-->
                                            <div class="mb-5">
                                                <label class="fs-6 form-label fw-bolder text-dark">موضوع فرعي Subtopic</label>
                                                <div class="scroll h-200px pt-2">
                                                    @foreach (\App\Models\Subtopic::get() as $subtopic)
                                                <!--begin::Checkbox-->
                                                <div class="form-check form-check-custom form-check-solid mb-5">
                                                    <input class="form-check-input" type="checkbox" value="{{ $subtopic->name}}"  name="filter[subtopic][]" />
                                                    <label class="form-check-label flex-grow-1 fw-bold text-gray-700 fs-6" for="type"> {{ $subtopic->name }}</label>
                                              </div>
                                                <!--end::Checkbox-->
                                                @endforeach
                                                </div>
                                                
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10">
                                                <label class="fs-6 form-label fw-bolder text-dark mb-5">نوع Type</label>
                                                <!--begin::Checkbox-->
                                                <div class="form-check form-check-custom form-check-solid mb-5">
                                                    <input class="form-check-input" type="checkbox" name="filter[type][]" value="hadith" />
                                                    <label class="form-check-label flex-grow-1 fw-bold text-gray-700 fs-6" for="type">Hadith</label>
                                                </div>
                                                <!--end::Checkbox-->
                                                <!--begin::Checkbox-->
                                                <div class="form-check form-check-custom form-check-solid mb-5">
                                                    <input class="form-check-input" type="checkbox" name="filter[type][]" value="nothadith" />
                                                    <label class="form-check-label flex-grow-1 fw-bold text-gray-700 fs-6" for="type">Nothadith</label>

                                                </div>
                                                <!--end::Checkbox-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Action-->
                                            <div class="d-flex align-items-left justify-content-start">
                                                <button type="reset" class="btn btn-active-light-primary btn-color-gray-400 me-3">Discard</button>
                                                <button type="submit" class="btn btn-primary">Filter</button>
                                            </div>
                                            <!--end::Action-->
                    
                                </form>
                                <!--end::Form-->

						</div>
						<!--end::Aside nav-->
					</div>

					<!--end::Aside-->
					<!--begin::Wrapper-->
					<div class="wrapper d-flex flex-column flex-row-fluid mt-5 mt-lg-10" id="kt_wrapper">
						<!--begin::Content-->
						<div class="content flex-column-fluid" id="kt_content">
							<!--begin::Toolbar-->
							<div class="toolbar d-flex flex-stack flex-wrap mb-5 mb-lg-7" id="kt_toolbar">
								<!--begin::Page title-->
								<div class="page-title d-flex flex-column py-1">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center my-1">
										<span class="text-dark fw-bolder fs-1">النتائج</span>
										<!--begin::Description-->
										<small class="text-muted fs-6 fw-bold ms-1">({{$count['value']}})</small>
										<!--end::Description-->
									</h1>
									<!--end::Title-->
								</div>
								<!--end::Page title-->
                                <div class="d-flex align-items-center py-1">
									<!--begin::Button-->
									<a href="{{'/search'}}" class="btn btn-flex btn-sm btn-primary fw-bolder border-0 fs-6 h-40px" id="kt_toolbar_primary_button">back to search</a>
									<!--end::Button-->
								</div>

							</div>
							<!--end::Toolbar-->
							<!--begin::Post-->
							<div class="post" id="kt_post">

									<!--end::Aside-->
								<!--begin::Questions-->
								<div class="mb-10">
                                   @foreach ($result as $item)
                                       									
									<div class="mb-0">
										<!--begin::Head-->
										<div class="d-flex align-items-center mb-4">
											<!--begin::Title-->
											<span class="fs-2 fw-bolder text-gray-900 text-hover-primary me-1">{{$item['_source']['ayah']['title']}}</span>
											<!--end::Title-->
											<!--begin::Icons-->
											<div class="d-flex align-items-center">
												<span class="ms-1">
													<!--begin::Svg Icon | path: icons/duotune/general/gen045.svg-->
													<span class="svg-icon svg-icon-primary svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
															<rect x="11" y="17" width="7" height="2" rx="1" transform="rotate(-90 11 17)" fill="black" />
															<rect x="11" y="9" width="2" height="2" rx="1" transform="rotate(-90 11 9)" fill="black" />
														</svg>
													</span>
													<!--end::Svg Icon-->
												</span>
											</div>
											<!--end::Icons-->
										</div>
										<!--end::Head-->
										<!--begin::Summary-->
										<div class="fs-2 fw-normal text-gray-700 mb-4">
                                            @if(isset($item))
                                            @if(isset($item['highlight']['paraghraphe.text.arabic_synonym_normalized']))
                                                @foreach ($item['highlight']['paraghraphe.text.arabic_synonym_normalized'] as $highlight)
                                                    <?php
                                                    echo $highlight; 
                                                    ?>
                                                @endforeach
                                            @elseif(isset($item['highlight']['paraghraphe.text.rebuilt_arabic']))
                                                @foreach ($item['highlight']['paraghraphe.text.rebuilt_arabic'] as $highlight)
                                                    <?php
                                                    echo $highlight; 
                                                    ?>
                                                @endforeach
                                            @else
                                                
                                                    <?php
                                                    echo $item['_source']['content']; 
                                                    ?>
                                                
                                            @endif
                                            @endif

                                        </div>
										<!--end::Summary-->
										<!--begin::Foot-->
										<div class="d-flex flex-stack flex-wrap">
											<!--begin::Author-->
											<div class="d-flex align-items-center py-1">
																		<!--begin::Symbol-->
												<div class="symbol symbol-35px me-2">
													<div class="symbol-label bg-light-success fs-3 fw-bold text-success text-uppercase">{{$item['_source']['ayah']['chapterNumber']}}</div>
												</div>
												<!--end::Symbol-->
												<!--begin::Name-->
												<div class="d-flex flex-column align-items-start justify-content-center">
													<span class="text-gray-900 fs-7 fw-bold lh-1 mb-2">آية</span>
											<span class="text-muted fs-8 fw-bold lh-1">{{$item['_source']['ayah']['ayahNumber']}}</span>	
												</div>
												<!--end::Name-->
											</div>
											<!--end::Author-->
											<!--begin::Info-->
											<div class="d-flex align-items-center py-1">

												<!--begin::Tags-->
												<a href="#" class="btn btn-sm btn-light px-4 me-2">تصفح
                                                    <span class="svg-icon svg-icon-7ms-2 me-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path opacity="0.5" d="M13 9.59998V21C13 21.6 12.6 22 12 22C11.4 22 11 21.6 11 21V9.59998H13Z" fill="currentColor"></path>
                                                            <path d="M5.7071 7.89291C5.07714 8.52288 5.52331 9.60002 6.41421 9.60002H17.5858C18.4767 9.60002 18.9229 8.52288 18.2929 7.89291L12.7 2.3C12.3 1.9 11.7 1.9 11.3 2.3L5.7071 7.89291Z" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </a>
												<!--end::Tags-->

											</div>
											<!--end::Info-->
										</div>
										<!--end::Foot-->
									</div>
									<!--end::Question-->

									<!--begin::Separator-->
									<div class="separator separator-dashed border-gray-300 my-8"></div>
									<!--end::Separator-->
                                   @endforeach

								</div>

							</div>
							<!--end::Post-->
						</div>
						<!--end::Content-->

					</div>
					<!--end::Wrapper-->

				</div>
				<!--end::Container-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->


		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
				</svg>
			</span>
			<!--end::Svg Icon-->
		</div>
		<!--end::Scrolltop-->
		<!--end::Main-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="assets/js/custom/widgets.js"></script>
		<script src="assets/js/custom/apps/chat/chat.js"></script>
		<script src="assets/js/custom/modals/create-app.js"></script>
		<script src="assets/js/custom/modals/upgrade-plan.js"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
