<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Agrima is a Fintech Startup">

	<!-- title -->
	<title>AGRIMA</title>

	<!-- Stylesheets
	============================================= -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Zilla+Slab:wght@400;500&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('assets/canvas/css/bootstrap.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('assets/canvas/style.css') }}" type="text/css" />

	<link rel="stylesheet" href="{{ asset('assets/canvas/css/dark.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('assets/canvas/css/font-icons.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('assets/canvas/css/animate.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('assets/canvas/css/magnific-popup.css') }}" type="text/css" />

	<link rel="stylesheet" href="{{ asset('assets/canvas/css/custom.css') }}" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Furniture Demo Specific Theme Stylesheet - #193532 -->
	<link rel="stylesheet" href="{{ asset('assets/canvas/css/colors.php?color=193532') }}" type="text/css" />

	<!-- Furniture Demo Specific Stylesheet -->
	<link rel="stylesheet" href="{{ asset('assets/canvas/demos/furniture/furniture.css') }}" type="text/css" /> <!-- Furniture Custom Css -->
	<link rel="stylesheet" href="{{ asset('assets/canvas/demos/furniture/css/fonts.css') }}" type="text/css" /> <!-- Furniture Custom Fonts -->
	<!-- / -->

    <!-- Page Style Imports -->
    @yield('page-imports')

</head>

<body class="stretched">

	<!-- Cart Panel Background
	============================================= -->
	<div class="body-overlay"></div>

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Top Bar
		============================================= -->
		@include('v2.includes.topbar')
		<!-- #top-bar end -->
	
		<!-- header -->
		@include('v2.includes.header')
		<!-- end header -->

		@yield('content')

		<!-- footer -->
		@include('v2.includes.footer')
		<!-- end footer -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="bg-color op-07 h-op-1">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><polygon points="48 208 128 128 208 208 48 208" opacity="0.2"></polygon><polygon points="48 208 128 128 208 208 48 208" fill="none" stroke="#FFF" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></polygon><polyline points="48 128 128 48 208 128" fill="none" stroke="#FFF" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></polyline></svg>
	</div>
	
	<!-- JavaScripts
	============================================= -->
	<script src="{{ asset('assets/canvas/js/jquery.js') }}"></script>
	<script src="{{ asset('assets/canvas/js/plugins.min.js') }}"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="{{ asset('assets/canvas/js/functions.js') }}"></script>

    @stack('scripts')

</body>
</html>