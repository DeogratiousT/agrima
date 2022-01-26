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
						<h1>All Products</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<div class="mt-2 mb-2">
        <div class="container">
            <div class="pr">
                <div class="tab">
                    @foreach ($categories as $category)
                        @if (count($category->subCategories) > 0)
                            <button class="tablinks" onmouseover="openCategory(event, '{{ $category-> id }}')">{{ $category->name }}</button>
                        @endif
                    @endforeach
                </div>
                    
                @foreach ($categories as $category)
                    @if (count($category->subCategories) > 0)
                        <div id="{{ $category->id}}" class="tabcontent">
                            <h4 class="mb-0"><a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a></h4>                            
                            <div class="card-columns">
                                @foreach ($category->subCategories as $subCategory)
                                    @if (count($subCategory->commodities) > 0)
                                        <div class="card pr-card">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <a href="{{ route('sub-categories.show', $subCategory) }}"><u>{{ $subCategory->name }}</u></a>
                                                </h5>
                                                @foreach ($subCategory->commodities as $commodity)
                                                    <a href="{{ route('commodities.show', $commodity) }}" class="m-0 p-0">{{ $commodity->name }}</a> <br>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>                            
                        </div>
                    @endif
                @endforeach

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function openCategory(evt, category) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(category).style.display = "block";
      evt.currentTarget.className += " active";
    }
    </script>
@endpush