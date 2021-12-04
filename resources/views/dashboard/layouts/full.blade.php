<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>
		<title>Agrima | @yield('title')</title>
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

        <!-- begin::Boostrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
        <!-- end::Boostrap Icons -->

		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset('metronic/css/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('metronic/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->

        <!--begin::Page Vendor Stylesheets(used by this page)-->
		    @yield('head-imports')
        <!--end::Page Vendor Stylesheets-->

		<!--Begin::Google Tag Manager -->
            {{-- TODO --}}
		<!--End::Google Tag Manager -->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-body">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Main Content -->
            <div class="d-flex flex-column flex-lg-row flex-column-fluid">
                <!--begin::Aside-->
                <div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative" style="background-color: #F2C98A">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
                        <!--begin::Content-->
                        <div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
                            <!--begin::Logo-->
                            <a href="{{ route('dashboard') }}" class="py-9 mb-5">
                                <h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">AGRIMA</h1>
                                {{-- <img alt="Logo" src="/metronic8/demo3/assets/media/logos/logo-2.svg" class="h-60px" /> --}}
                            </a>
                            <!--end::Logo-->
                            <!--begin::Title-->
                            <h1 class="fw-bolder fs-2qx pb-5 pb-md-10" style="color: #986923;">Welcome to Agrima</h1>
                            <!--end::Title-->
                            <!--begin::Description-->
                            <p class="fw-bold fs-2" style="color: #986923;">Discover Amazing Agripa 
                            <br />with great farm products</p>
                            <!--end::Description-->
                        </div>
                        <!--end::Content-->
                        <!--begin::Illustration-->
                        <div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px" style="background-image: url(/images/full.png)"></div>
                        <!--end::Illustration-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Aside-->
                <!--begin::Body-->
                <div class="d-flex flex-column flex-lg-row-fluid py-10">
                    <!--begin::Content-->
                    <div class="d-flex flex-center flex-column flex-column-fluid">
                        <!--begin::Wrapper-->
                        <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                            <!--begin::Form-->
                                @yield('content')
                            <!--end::Form-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Body-->
            </div>
			<!--end::Main Content -->
		</div>
		<!--end::Main-->
		<script>var hostUrl = "/";</script>

		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{ asset('metronic/js/plugins.bundle.js') }}"></script>
		<script src="{{ asset('metronic/js/scripts.bundle.js') }}"></script>
		<!--end::Global Javascript Bundle-->

		<!--begin::Page Custom Javascript(used by this page)-->
            @stack('scripts')
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->

		<!--Begin::Google Tag Manager (noscript) -->
            {{-- TODO --}}
		<!--End::Google Tag Manager (noscript) -->
	</body>
	<!--end::Body-->
</html>