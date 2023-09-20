@extends('layouts.app')

@section('content')
    <!-- Title
    ============================================= -->
    <section id="page-title" class="page-title-pattern">

        <div class="container clearfix text-white">
            <h1 class="text-white">{{ $subCategory->name }}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('shop') }}">Shop</a></li>
                <li class="breadcrumb-item"><a href="{{ route('category',$subCategory->category) }}">{{ $subCategory->category->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $subCategory->name}}</li>
            </ol>
        </div>

    </section> <!-- #title end -->

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="section-title text-center mb-4">
                    <h3 class="mb-3"><span data-animate="svg-underline-animated"
                        class="svg-underline nocolor svg-underline-animated animated">{{ $subCategory->name }}</span></h3>
                </div>

                <div class="container clearfix">

					<div class="row grid-6">

						@forelse ($subCategory->commodities as $commodity)
                            <!-- Shop Item
                            ============================================= -->
                            <div class="col-lg-2 col-md-3 col-6 px-2">
                                <div class="product border shadow p-2">
                                    <div class="product-image">
                                        <a href="{{ route('commodity', $commodity) }}"><img src="{{ env('AWS_URL') . '/commodity-images/' . $commodity->cover_image ?? $fallbackImageUrl  }}" alt="{{ $commodity->name }}" alt="{{ $commodity->name }}"></a>
                                        <a href="{{ route('commodity', $commodity) }}"><img src="{{ env('AWS_URL') . '/commodity-images/' . $commodity->cover_image ?? $fallbackImageUrl  }}" alt="{{ $commodity->name }}" alt="{{ $commodity->name }}"></a>
                                    </div>
                                    <div class="product-desc">
                                        <div class="product-title mb-1"><h3><a href="{{ route('commodity', $commodity) }}" class="text-success">{{ $commodity->name }}</a></h3></div>
                                        <div class="product-price font-primary"><h5 class="text-dark">KES {{ $commodity->price }}</h5></div>
                                        {{-- <div class="product-rating">
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star-half-full"></i>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No Records Found</p>                            
                        @endforelse

					</div>

				</div>
            </div>
        </div>
    </section>
@endsection