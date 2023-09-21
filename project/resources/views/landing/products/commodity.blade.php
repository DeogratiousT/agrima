@extends('layouts.app')

@section('page-imports')
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@endsection

@section('content')
<!-- Title
============================================= -->
<section id="page-title" class="page-title-pattern">

    <div class="container clearfix text-white">
        <h1 class="text-white">{{ $commodity->name }}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('shop') }}">Shop</a></li>
            <li class="breadcrumb-item"><a href="{{ route('category',$commodity->subCategory->category) }}">{{ $commodity->subCategory->category->name }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sub-category',$commodity->subCategory) }}">{{ $commodity->subCategory->name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $commodity->name}}</li>
        </ol>
    </div>

</section> <!-- #title end -->

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">

            @include('dashboard.includes.messages')

            <div class="row gutter-40 col-mb-80">
                <div class="postcontent col-lg-9">
                    <div class="single-product">
                        <div class="product">
                            <div class="row gutter-40">

                                <div class="col-md-4">

                                    <!-- Product Single - Gallery
                                    ============================================= -->
                                    <div class="product-image">
                                        <div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
                                            <div class="flexslider">
                                                <div class="slider-wrap" data-lightbox="gallery">
                                                    <div class="slide" data-thumb="{{ $commodity->cover_image }}">
                                                        <a href="{{ $commodity->cover_image }}" title="{{ $commodity->name }}" data-lightbox="gallery-item"><img src="{{ $commodity->cover_image }}" alt="{{ $commodity->name }}"></a>
                                                    </div>											
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="sale-flash badge bg-danger p-2">Sale!</div> --}}
                                    </div><!-- Product Single - Gallery End -->


                                </div>

                                <div class="col-md-8 product-desc px-4">

                                    <!-- Product Single - Title
                                        ============================================= -->
                                        <div class="">
                                            <h3 class="mb-4 mt-0"><span data-animate="svg-underline-animated"
                                                class="svg-underline nocolor svg-underline-animated animated">{{ $commodity->name }}</span>
                                            </h3>
                                        </div>

                                    <div class="d-flex align-items-center justify-content-between">

                                        <!-- Product Single - Price
                                                ============================================= -->
                                        <div class="product-price"><ins>KES {{ $commodity->price }}</ins></div>
                                        <!-- Product Single - Price End -->

                                        <!-- Product Single - Rating
                                                ============================================= -->
                                        {{-- <div class="product-rating">
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star3"></i>
                                            <i class="icon-star-half-full"></i>
                                            <i class="icon-star-empty"></i>
                                        </div><!-- Product Single - Rating End --> --}}

                                    </div>

                                    <div class="line"></div>

                                    <!-- Product Single - Quantity & Cart Button
                                    ============================================= -->
                                    @if ($commodity->exists)
                                        <form class="cart mb-0 d-flex justify-content-between align-items-center" method="post" enctype="multipart/form-data">
                                            <div class="quantity clearfix">
                                                <input type="button" value="-" class="minus">
                                                <input type="number" step="1" min="1" name="quantity" value="{{ $commodity->cartQuantity }}" title="Qty" class="qty" onchange="updateQuantity(this, '{{ $commodity->slug }}' , '{{ $commodity->cartQuantity }}')">
                                                <input type="button" value="+" class="plus">
                                            </div>
                                        </form>
                                    @else
                                        <form class="mb-0 d-flex justify-content-between align-items-center" method="post" action="{{ route('cart.add', $commodity) }}" enctype="multipart/form-data">
                                            @csrf

                                            <div class="quantity clearfix">
                                                <input type="button" value="-" class="minus">
                                                <input type="number" step="1" min="1" name="quantity" value="1" title="Qty"
                                                    class="qty">
                                                <input type="button" value="+" class="plus">
                                            </div>
                                            <button type="submit" class="add-to-cart button m-0">Add to cart</button>
                                        </form>
                                    @endif
                                    <!-- Product Single - Quantity & Cart Button End -->

                                    <div class="line"></div>

                                    <!-- Product Single - Short Description
                                            ============================================= -->
                                    <div>{!! $commodity->description !!}</div>
                                    
                                    <!-- Product Single - Share
                                            ============================================= -->
                                    <div class="si-share border-0 d-flex justify-content-between align-items-center mt-4">
                                        <span>Share:</span>
                                        <div>
                                            <a href="#" class="social-icon si-borderless si-facebook">
                                                <i class="icon-facebook"></i>
                                                <i class="icon-facebook"></i>
                                            </a>
                                            <a href="#" class="social-icon si-borderless si-twitter">
                                                <i class="icon-twitter"></i>
                                                <i class="icon-twitter"></i>
                                            </a>
                                            <a href="#" class="social-icon si-borderless si-pinterest">
                                                <i class="icon-pinterest"></i>
                                                <i class="icon-pinterest"></i>
                                            </a>
                                            <a href="#" class="social-icon si-borderless si-gplus">
                                                <i class="icon-gplus"></i>
                                                <i class="icon-gplus"></i>
                                            </a>
                                            <a href="#" class="social-icon si-borderless si-rss">
                                                <i class="icon-rss"></i>
                                                <i class="icon-rss"></i>
                                            </a>
                                            <a href="#" class="social-icon si-borderless si-email3">
                                                <i class="icon-email3"></i>
                                                <i class="icon-email3"></i>
                                            </a>
                                        </div>
                                    </div><!-- Product Single - Share End -->

                                </div>

                                <div class="line"></div>

                                <div class="w-100 pe-4">

                                    <h4>Related Products</h4>
    
                                    <div class="owl-carousel product-carousel carousel-widget owl-loaded owl-drag" data-margin="30" data-pagi="false" data-autoplay="5000" data-items-xs="1" data-items-md="2" data-items-lg="3" data-items-xl="4">

                                        <div class="owl-stage-outer">
                                            <div class="owl-stage" style="transform: translate3d(-248px, 0px, 0px); transition: all 0.25s ease 0s; width: 1240px;">
                                                @forelse ($relatedCommodities as $commodity)
                                                    <div class="owl-item" style="width: 218px; margin-right: 30px;">
                                                        <div class="oc-item">
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
                                                    </div>
                                                @empty
                                                    
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
    
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="sidebar col-lg-3 bg-color-light px-4 pt-4 pb-0">
                    <div class="sidebar-widgets-wrap">

                        <div class="widget widget_links clearfix">

                            <h4>Shop Categories</h4>
                            <ul>
                                @foreach ($categories as $category)
                                    <li><a href="{{ route('category', $category) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</section>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script>
        function updateQuantity(obj, slug, currentQuantity) {

            let newQuantity = obj.value;

            const requestBody = {
                slug: slug,
                newQuantity: newQuantity,
            }

            if (currentQuantity != newQuantity) {
                axios.post("{{ route('cart.update') }}", requestBody)
                    .then((response) => {
                        if (response.data.itemSlug == slug) {
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