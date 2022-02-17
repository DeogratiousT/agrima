@extends('layouts.app')

@section('page-imports')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>{{ $commodity->name }}</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="https://agrimastoragefilesbucket.s3.af-south-1.amazonaws.com/commodity-images/{{ $commodity->cover_image }}" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3>{{ $commodity->name }}</h3>
						<p class="single-product-pricing"><span>Per Kg</span> {{ $commodity->price }}</p>
						<div class="single-product-form">
							<form action="index.html">
								<input type="number" placeholder="0">
							</form>
							<a href="{{ route('cart.add', $commodity) }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
							<p><strong>Categories: </strong>{{ $commodity->subCategory->category->name }}, {{ $commodity->subCategory->name }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection