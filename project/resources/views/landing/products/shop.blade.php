@extends('layouts.app')

@section('content')
    <!-- Title
    ============================================= -->
    <section id="page-title" class="page-title-pattern">

        <div class="container clearfix text-white">
            <h1 class="text-white">Shop</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shop</li>
            </ol>
        </div>

    </section> <!-- #title end -->

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="section-title text-center">
                    <h3 class="mb-3">Shop by <span data-animate="svg-underline-animated"
                        class="svg-underline nocolor svg-underline-animated animated">Category</span></h3>
                </div>

                <!-- Categories -->
				<div class="row item-categories gutter-20 justify-content-center mt-4">
					@forelse ($categories as $category)
						<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
							<a href="{{ route('category', $category) }}" class="d-block h-op-09 op-ts rounded custom-shadow" style="background: url('{{ env('AWS_URL') . '/category-images/' . $category->cover_image ?? $fallbackImageUrl  }}') no-repeat center center; background-size: cover; height: 120px;">
								<h5 class="text-uppercase ls1 bg-dark text-light mb-0 p-2">{{ $category->name }}</h5>
							</a>
						</div>
                    @empty
                        <p class="text-dark">No Records Found</p>
					@endforelse
				</div>

            </div>
        </div>
    </section>
@endsection