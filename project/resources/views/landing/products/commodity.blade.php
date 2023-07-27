@extends('layouts.app')

@section('page-imports')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
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
							{{-- <form action="index.html">
								<input type="number" placeholder="0">
							</form> --}}
							<form id="form-{{ $commodity->slug }}">
								<input type="number" name="{{ $commodity->slug }}" id="{{ $commodity->slug }}" value="{{ $commodity->cartQuantity }}" min="1" onchange="updateQuantity({{ $commodity }} , {{ $commodity->cartQuantity }})">
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

@push('scripts')
	<script src="{{ asset('assets/js/app.js') }}"></script>
	<script>
		function updateQuantity(item, currentQuantity){

			let newQuantity = document.getElementById(item.slug).value;
			
			const requestBody = {
				slug : item.slug,
				newQuantity : newQuantity,
			}

			if (currentQuantity != newQuantity) {
				axios.post("{{ route('cart.update') }}", requestBody)
				.then((response) => {
					if (response.data.itemSlug == item.slug) {
						// document.getElementById("price-" + response.data.itemSlug).innerHTML = response.data.itemPrice;
						// document.getElementById('total-price').innerHTML = response.data.totalPrice;
						document.getElementById('header-total-quantity').innerHTML = response.data.totalQuantity;
						
					}
				})
				.catch((error) => {
					console.log(error);
				});
			}
		}
	</script>
@endpush