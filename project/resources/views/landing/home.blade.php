@extends('layouts.app')

@section('content')
    <!-- Hero Section
	============================================= -->
	<section id="slider" class="slider-element dark justify-content-start">

		<!-- Hero Text
		============================================= -->
		<div class="container z-1">
			<div class="row align-items-start justify-content-center justify-content-xl-start py-6">
				<div class="col-xl-6 col-lg-9 col-md-10 mt-xl-4 text-center text-xl-start fadeInLeft animated" data-animate="fadeInLeft">
					<p class="op-07 text-white mb-3 text-uppercase ls2 text-smaller">Fresh Everyday</p>
					<h1 class="display-4 mb-5 text-white fw-medium">
						AGRIMA Marketplace<br>
						<span class="svg-underline nocolor">100% Organic</span> 
						Collection
					</h1>

					<a href="{{ route('shop') }}" class="button button-large button-white button-light h-op-09 color m-0 fw-normal color px-4">
						<i style="position: relative; top: -2px;">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--themecolor)" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><rect x="32" y="48" width="192" height="160" rx="8" opacity="0.2"></rect><rect x="32" y="48" width="192" height="160" rx="8" stroke-width="16" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" fill="none"></rect><path d="M168,88a40,40,0,0,1-80,0" fill="none" stroke="var(--themecolor)" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path></svg>
						</i> 
						Shop Now
					</a>
				</div>
			</div>
		</div>

		<!-- Hero line in Responsive
		============================================= -->
		<div class="line d-block d-xl-none my-0"></div>

		<!-- Hero Image
		============================================= -->
		<div class="hero-image zoomIn animated" data-animate="zoomIn">
			<img src="{{ asset('assets/images/hero2.png') }}" alt="">
		</div>

	</section>

	<!-- Content
	============================================= -->
	<section id="content">
		<div class="content-wrap py-0">

			<!-- 1. Section Why Choose Us
			============================================= -->
			<div class="section bg-color-light m-0">
				<div class="container text-center mw-md topmargin bottommargin">

					<h2 class="display-4 fw-normal">Why <span data-animate="svg-underline-animated" class="svg-underline nocolor"><span>Choose</span></span> Us?</h2>

					<div class="clear"></div>

					<!-- Features Area -->
					<div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
						<div class="col">
							<div class="card h-100">
								<div class="card-body">
									<div class="feature-box fbox-center fbox-effect">
										<div class="fbox-icon">
											<a href="#"><i class="icon-hand-up i-alt"></i></a>
										</div>
										<div class="fbox-content">
											<h3>Ease of Use</h3>
											<p>We are User Friendly Digital Platform that streamlines the entire agricultural supply chain by providing farmers with a wealth of resources including real-time market prices, ready markets and expert advice, all at their fingertips</p>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col">
							<div class="card h-100">
								<div class="card-body">
									<div class="feature-box fbox-center fbox-effect">
										<div class="fbox-icon">
											<a href="#"><i class="icon-line-phone-call i-alt"></i></a>
										</div>
										<div class="fbox-content">
											<h3>24/7 Support</h3>
											<p>We offer round-the-clock continuous assistance to buyers and provide farmers with instant access to agricultural experts and technical advice ensuring they receive timely guidance for various issues, such as crop disease and pest outbreaks and irrigation problems.</p>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col">
							<div class="card h-100">
								<div class="card-body">
									<div class="feature-box fbox-center fbox-effect">
										<div class="fbox-icon">
											<a href="#"><i class="icon-dollar-sign i-alt"></i></a>
										</div>
										<div class="fbox-content">
											<h3>Fair</h3>
											<p>We provide reliable platform by eliminating the exploitative practices often associated with intermediaries and hence, ensure fair prices for both farmers and buyers through a transparent marketplace that foster trust and mutual benefit within the agricultural sector.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Brand Logo Area -->
					<div class="row justify-content-center">
						<div class="col-lg-9 mt-4 pt-4">
							<div class="row justify-content-center align-items-center text-center mx-auto">
								<div class="col center op-08"><img src="{{ asset('assets/images/giz.png') }}" alt="" width="auto" height="100"></div>
								<div class="col center op-08"><img src="{{ asset('assets/images/lakehub.png') }}" alt="" width="auto" height="100"></div>
							</div>
						</div>
					</div>

				</div>
			</div> <!-- Section End -->

			<!-- 2. Section Shop by Category
			============================================= -->
			<div class="section m-0">
				<!-- Heading Title -->
				<div class="text-center mb-5">
					<h2 class="display-4 fw-normal mb-4">
						Shop by 
						<span data-animate="svg-underline-animated" class="svg-underline nocolor">
							<span>Category</span>
						</span>
					</h2>
					
					<a href="{{ route('shop') }}" class="button button-border button-dark button-rounded button-reveal text-end text-uppercase m-0"><i class="icon-angle-right"></i><span>View All</span></a>
				</div>

				<!-- Categories -->
				<div class="row item-categories gutter-20 justify-content-center mt-4">
					@foreach ($categories as $category)
						<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
							<a href="{{ route('category', $category) }}" class="d-block h-op-09 op-ts rounded custom-shadow" style="background: url('{{ env('AWS_URL') . '/category-images/' . $category->cover_image ?? $fallbackImageUrl  }}') no-repeat center center; background-size: cover; height: 240px;">
								<h5 class="text-uppercase ls1 bg-dark text-light mb-0 p-2">{{ $category->name }}</h5>
							</a>
						</div>
					@endforeach
				</div>

			</div><!-- Section End -->

		</div>
	</section><!-- #content end -->	
@endsection