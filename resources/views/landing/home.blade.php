@extends('layouts.app')

@section('content')
    <!-- home page slider -->
	<div class="homepage-slider">
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-1">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Fresh & Organic</p>
								<h1>Delicious Seasonal Fruits</h1>
								<div class="hero-btns">
									<a href="{{ route('shop') }}" class="boxed-btn">Visit Shop</a>
									<a href="{{ route('contact') }}" class="bordered-btn">Contact Us</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-2">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 text-center">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Fresh Everyday</p>
								<h1>100% Organic Collection</h1>
								<div class="hero-btns">
									<a href="{{ route('shop') }}" class="boxed-btn">Visit Shop</a>
									<a href="{{ route('contact') }}" class="bordered-btn">Contact Us</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-3">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 text-right">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Mega Sale Going On!</p>
								<h1>Get December Discount</h1>
								<div class="hero-btns">
									<a href="{{ route('shop') }}" class="boxed-btn">Visit Shop</a>
									<a href="{{ route('contact') }}" class="bordered-btn">Contact Us</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end home page slider -->

	<!-- features list section -->
	<div class="list-section pt-80 pb-80">
		<div class="container">

			<div class="row">
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-hand-point-up"></i>
						</div>
						<div class="content">
							<h3>Ease of Use</h3>
							<p>User Friendly Platform</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-phone-volume"></i>
						</div>
						<div class="content">
							<h3>24/7 Support</h3>
							<p>Get support all day</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="list-box d-flex justify-content-start align-items-center">
						<div class="list-icon">
							<i class="fas fa-dollar-sign"></i>
						</div>
						<div class="content">
							<h3>Fair</h3>
							<p>Cost effective Costs for Buyers and Sellers</p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- end features list section -->

	<!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Product </span> Categories </h3>
						<p>Search products based on product categories like Fruits, Grains and Vegetables</p>
						<a href="{{ route('shop') }}" class="btn btn-primary p-2 m-2">View All Products</a>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						@foreach ($categories as $category)
							<div class="single-logo-item">
								<div class="card" style="width: 18rem;">
									<img class="card-img-top" src="{{ asset('uploads/categories/category-images/' . $category->cover_image) }}" alt="Category">
									<div class="card-body">
									<h5 class="card-title">{{ $category->name }}</h5>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- end product section -->
	
@endsection