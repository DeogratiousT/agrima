@extends('layouts.app')

@section('content')
    <!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>{{ $subCategory->name }}</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<div class="mt-2 mb-2">
        <div class="container">
			<div class="row product-lists">
                @foreach ($subCategory->commodities  as $commodity)
                    <div class="col-lg-4 col-md-6 text-center {{ $subCategory->name }}">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ route('commodity', $commodity) }}"><img src="https://agrimastoragefilesbucket.s3.af-south-1.amazonaws.com/commodity-images/{{ $commodity->cover_image }}" alt=""></a>
                            </div>
                            <h3>{{ $commodity->name }}</h3>
                            <p class="product-price"><span>Per Kg</span> {{ $commodity->price }} </p>
                        <a href="{{ route('cart.add', $commodity) }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        </div>
                    </div>
                @endforeach
			</div>
        </div>
    </div>
@endsection