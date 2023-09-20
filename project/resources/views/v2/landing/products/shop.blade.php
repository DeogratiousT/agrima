@extends('v2.layouts.app')

@section('content')
    <!-- Title
    ============================================= -->
    <section id="page-title" class="page-title-parallax page-title-dark skrollable skrollable-between"
    style="background-image: url('/assets/images/about.png'); padding: 120px 0px; background-position: 0px -63.3645px; opacity: 0.8" data-bottom-top="background-position:0 -300px;" data-top-bottom="background-position:0px -300px;">

        <div class="container clearfix">
            <h1 class="bg-success p-2 rounded d-inline-block">Shop</h1>
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
							<a href="{{ route('v2.category', $category) }}" class="d-block h-op-09 op-ts rounded custom-shadow" style="background: url('{{ env('AWS_URL') . '/category-images/' . $category->cover_image ?? $fallbackImageUrl  }}') no-repeat center center; background-size: cover; height: 120px;">
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