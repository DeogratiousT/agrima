
<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<title>Agrima</title>
		<meta name="description" content="Agrima Systems" />
		<meta name="keywords" content="Agrima" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Agrima System" />
		<meta property="og:url" content="https://agrima" />
		<meta property="og:site_name" content="Agrima" />
		<link rel="canonical" href="Https://agrima" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />

		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->

		<!--begin::Page Vendor Stylesheets(used by this page)-->
		    @yield('head-imports')
		<!--end::Page Vendor Stylesheets-->

		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset('metronic/css/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('metronic/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->

	</head>
	<!--end::Head-->

	<!--begin::Body-->
	<body id="kt_body" class="sidebar-enabled">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
                    @include('dashboard.includes.aside')
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" class="header">
						<!--begin::Container-->
						<div class="container d-flex align-items-center justify-content-between" id="kt_header_container">
							<!--begin::Page title-->
							<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
								<!--begin::Heading-->
								<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">AGRIMA</h1>
								<!--end::Heading-->
							</div>
							<!--end::Page title=-->
							<!--begin::Wrapper-->
							<div class="d-flex d-lg-none align-items-center ms-n2 me-2">
								<!--begin::Aside mobile toggle-->
								<div class="btn btn-icon btn-active-icon-primary" id="kt_aside_toggle">
									<!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
									<span class="svg-icon svg-icon-1 mt-1">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
											<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
										</svg>
									</span>
									<!--end::Svg Icon-->
								</div>
								<!--end::Aside mobile toggle-->
								<!--begin::Logo-->
								<a href="../../demo3/dist/index.html" class="d-flex align-items-center">
									<img alt="Logo" src="assets/media/logos/logo-demo3-default.svg" class="h-20px" />FGDFG
								</a>
								<!--end::Logo-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div class="container-xxl" id="kt_content_container">
							<!--begin::Row-->
							<div class="row gy-5 g-xl-10">
								<!--begin::Col-->
								<div class="col-xl-4">
									<!--begin::Mixed Widget 13-->
									<div class="card card-xl-stretch mb-xl-10" style="background-color: #F7D9E3">
										<!--begin::Body-->
										<div class="card-body d-flex flex-column">
											<!--begin::Wrapper-->
											<div class="d-flex flex-column flex-grow-1">
												<!--begin::Title-->
												<a href="#" class="text-dark text-hover-primary fw-bolder fs-3">Earnings</a>
												<!--end::Title-->
												<!--begin::Chart-->
												<div class="mixed-widget-13-chart" style="height: 100px"></div>
												<!--end::Chart-->
											</div>
											<!--end::Wrapper-->
											<!--begin::Stats-->
											<div class="pt-5">
												<!--begin::Symbol-->
												<span class="text-dark fw-bolder fs-2x lh-0">$</span>
												<!--end::Symbol-->
												<!--begin::Number-->
												<span class="text-dark fw-bolder fs-3x me-2 lh-0">560</span>
												<!--end::Number-->
												<!--begin::Text-->
												<span class="text-dark fw-bolder fs-6 lh-0">+ 28% this week</span>
												<!--end::Text-->
											</div>
											<!--end::Stats-->
										</div>
										<!--end::Body-->
									</div>
									<!--end::Mixed Widget 13-->
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-xl-4">
									<!--begin::Mixed Widget 14-->
									<div class="card card-xxl-stretch mb-xl-10" style="background-color: #CBF0F4">
										<!--begin::Body-->
										<div class="card-body d-flex flex-column">
											<!--begin::Wrapper-->
											<div class="d-flex flex-column flex-grow-1">
												<!--begin::Title-->
												<a href="#" class="text-dark text-hover-primary fw-bolder fs-3">Contributors</a>
												<!--end::Title-->
												<!--begin::Chart-->
												<div class="mixed-widget-14-chart" style="height: 100px"></div>
												<!--end::Chart-->
											</div>
											<!--end::Wrapper-->
											<!--begin::Stats-->
											<div class="pt-5">
												<!--begin::Number-->
												<span class="text-dark fw-bolder fs-3x me-2 lh-0">47</span>
												<!--end::Number-->
												<!--begin::Text-->
												<span class="text-dark fw-bolder fs-6 lh-0">- 12% this week</span>
												<!--end::Text-->
											</div>
											<!--end::Stats-->
										</div>
									</div>
									<!--end::Mixed Widget 14-->
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-xl-4">
									<!--begin::Mixed Widget 14-->
									<div class="card card-xxl-stretch mb-5 mb-xl-10" style="background-color: #CBD4F4">
										<!--begin::Body-->
										<div class="card-body d-flex flex-column">
											<!--begin::Wrapper-->
											<div class="d-flex flex-column mb-7">
												<!--begin::Title-->
												<a href="#" class="text-dark text-hover-primary fw-bolder fs-3">Summary</a>
												<!--end::Title-->
											</div>
											<!--end::Wrapper-->
											<!--begin::Row-->
											<div class="row g-0">
												<!--begin::Col-->
												<div class="col-6">
													<div class="d-flex align-items-center mb-9 me-2">
														<!--begin::Symbol-->
														<div class="symbol symbol-40px me-3">
															<div class="symbol-label bg-white bg-opacity-50">
																<!--begin::Svg Icon | path: icons/duotune/abstract/abs043.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-dark">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path opacity="0.3" d="M22 8H8L12 4H19C19.6 4 20.2 4.39999 20.5 4.89999L22 8ZM3.5 19.1C3.8 19.7 4.4 20 5 20H12L16 16H2L3.5 19.1ZM19.1 20.5C19.7 20.2 20 19.6 20 19V12L16 8V22L19.1 20.5ZM4.9 3.5C4.3 3.8 4 4.4 4 5V12L8 16V2L4.9 3.5Z" fill="black" />
																		<path d="M22 8L20 12L16 8H22ZM8 16L4 12L2 16H8ZM16 16L12 20L16 22V16ZM8 8L12 4L8 2V8Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
														</div>
														<!--end::Symbol-->
														<!--begin::Title-->
														<div>
															<div class="fs-5 text-dark fw-bolder lh-1">$50K</div>
															<div class="fs-7 text-gray-600 fw-bold">Sales</div>
														</div>
														<!--end::Title-->
													</div>
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-6">
													<div class="d-flex align-items-center mb-9 ms-2">
														<!--begin::Symbol-->
														<div class="symbol symbol-40px me-3">
															<div class="symbol-label bg-white bg-opacity-50">
																<!--begin::Svg Icon | path: icons/duotune/abstract/abs046.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-dark">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path d="M8 22C7.4 22 7 21.6 7 21V9C7 8.4 7.4 8 8 8C8.6 8 9 8.4 9 9V21C9 21.6 8.6 22 8 22Z" fill="black" />
																		<path opacity="0.3" d="M4 15C3.4 15 3 14.6 3 14V6C3 5.4 3.4 5 4 5C4.6 5 5 5.4 5 6V14C5 14.6 4.6 15 4 15ZM13 19V3C13 2.4 12.6 2 12 2C11.4 2 11 2.4 11 3V19C11 19.6 11.4 20 12 20C12.6 20 13 19.6 13 19ZM17 16V5C17 4.4 16.6 4 16 4C15.4 4 15 4.4 15 5V16C15 16.6 15.4 17 16 17C16.6 17 17 16.6 17 16ZM21 18V10C21 9.4 20.6 9 20 9C19.4 9 19 9.4 19 10V18C19 18.6 19.4 19 20 19C20.6 19 21 18.6 21 18Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
														</div>
														<!--end::Symbol-->
														<!--begin::Title-->
														<div>
															<div class="fs-5 text-dark fw-bolder lh-1">$4,5K</div>
															<div class="fs-7 text-gray-600 fw-bold">Revenue</div>
														</div>
														<!--end::Title-->
													</div>
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-6">
													<div class="d-flex align-items-center me-2">
														<!--begin::Symbol-->
														<div class="symbol symbol-40px me-3">
															<div class="symbol-label bg-white bg-opacity-50">
																<!--begin::Svg Icon | path: icons/duotune/abstract/abs022.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-dark">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path opacity="0.3" d="M11.425 7.325C12.925 5.825 15.225 5.825 16.725 7.325C18.225 8.825 18.225 11.125 16.725 12.625C15.225 14.125 12.925 14.125 11.425 12.625C9.92501 11.225 9.92501 8.825 11.425 7.325ZM8.42501 4.325C5.32501 7.425 5.32501 12.525 8.42501 15.625C11.525 18.725 16.625 18.725 19.725 15.625C22.825 12.525 22.825 7.425 19.725 4.325C16.525 1.225 11.525 1.225 8.42501 4.325Z" fill="black" />
																		<path d="M11.325 17.525C10.025 18.025 8.425 17.725 7.325 16.725C5.825 15.225 5.825 12.925 7.325 11.425C8.825 9.92498 11.125 9.92498 12.625 11.425C13.225 12.025 13.625 12.925 13.725 13.725C14.825 13.825 15.925 13.525 16.725 12.625C17.125 12.225 17.425 11.825 17.525 11.325C17.125 10.225 16.525 9.22498 15.625 8.42498C12.525 5.32498 7.425 5.32498 4.325 8.42498C1.225 11.525 1.225 16.625 4.325 19.725C7.425 22.825 12.525 22.825 15.625 19.725C16.325 19.025 16.925 18.225 17.225 17.325C15.425 18.125 13.225 18.225 11.325 17.525Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
														</div>
														<!--end::Symbol-->
														<!--begin::Title-->
														<div>
															<div class="fs-5 text-dark fw-bolder lh-1">40</div>
															<div class="fs-7 text-gray-600 fw-bold">Tasks</div>
														</div>
														<!--end::Title-->
													</div>
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-6">
													<div class="d-flex align-items-center ms-2">
														<!--begin::Symbol-->
														<div class="symbol symbol-40px me-3">
															<div class="symbol-label bg-white bg-opacity-50">
																<!--begin::Svg Icon | path: icons/duotune/abstract/abs045.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-dark">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path d="M2 11.7127L10 14.1127L22 11.7127L14 9.31274L2 11.7127Z" fill="black" />
																		<path opacity="0.3" d="M20.9 7.91274L2 11.7127V6.81275C2 6.11275 2.50001 5.61274 3.10001 5.51274L20.6 2.01274C21.3 1.91274 22 2.41273 22 3.11273V6.61273C22 7.21273 21.5 7.81274 20.9 7.91274ZM22 16.6127V11.7127L3.10001 15.5127C2.50001 15.6127 2 16.2127 2 16.8127V20.3127C2 21.0127 2.69999 21.6128 3.39999 21.4128L20.9 17.9128C21.5 17.8128 22 17.2127 22 16.6127Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
														</div>
														<!--end::Symbol-->
														<!--begin::Title-->
														<div>
															<div class="fs-5 text-dark fw-bolder lh-1">$5.8M</div>
															<div class="fs-7 text-gray-600 fw-bold">Sales</div>
														</div>
														<!--end::Title-->
													</div>
												</div>
												<!--end::Col-->
											</div>
											<!--end::Row-->
										</div>
									</div>
									<!--end::Mixed Widget 14-->
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container d-flex flex-column flex-md-row flex-stack">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-gray-400 fw-bold me-1">Created by</span>
								<a href="https://keenthemes.com" target="_blank" class="text-muted text-hover-primary fw-bold me-2 fs-6">Keenthemes</a>
							</div>
							<!--end::Copyright-->
							<!--begin::Menu-->
							<ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
								<li class="menu-item">
									<a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
								</li>
								<li class="menu-item">
									<a href="https://keenthemes.com/support" target="_blank" class="menu-link px-2">Support</a>
								</li>
								<li class="menu-item">
									<a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
								</li>
							</ul>
							<!--end::Menu-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
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
		<script src="{{ asset('metronic/js/plugins.bundle.js') }}"></script>
		<script src="{{ asset('metronic/js/scripts.bundle.js') }}"></script>
		<!--end::Global Javascript Bundle-->

		<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="{{ asset('metronic/js/fullcalendar.bundle.js') }}"></script>
		<!--end::Page Vendors Javascript-->

		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="{{ asset('metronic/js/widgets.js') }}"></script>
		<script src="{{ asset('metronic/js/chat.js') }}"></script>
		<script src="{{ asset('metronic/js/create-app.js') }}"></script>
		<script src="{{ asset('metronic/js/upgrade-plan.js') }}"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>