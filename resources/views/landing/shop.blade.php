@extends('layouts.app')

@section('content')
    <!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>All Products</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<div class="mt-150 mb-150">
		<div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            @foreach ($categories as $category)
                                <li data-filter=".{{ $category->name }}">{{ $category->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row product-lists">
                @foreach ($categories as $category)
                    @foreach ($category->commodities as $commodity)
                        <div class="col-lg-4 col-md-6 text-center {{ $category->name }}">
                            <div class="single-product-item">
                                <div class="product-image">
                                    <a href="#"><img src="{{ asset('uploads/commodities/commmodity-images/' . $commodity->cover_image) }}" height="175rem" width="100%" alt=""></a>
                                </div>
                                <h3>{{ $commodity->name }}</h3>
                                <p class="product-price"><span>Per Unit</span> {{ $commodity->price }} </p>
                                <a href="{{ route('cart.add', $commodity) }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                            </div>
                        </div> 
                    @endforeach
                @endforeach
			</div>

            {{-- <div class="row">
				<div class="col-lg-12 text-center">
					<div class="pagination-wrap">
						<ul>
							<li><a href="#">Prev</a></li>
							<li><a href="#">1</a></li>
							<li><a class="active" href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					</div>
				</div>
			</div> --}}
        </div>
    </div>
@endsection