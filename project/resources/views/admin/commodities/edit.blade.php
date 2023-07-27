@extends('dashboard.layouts.app')

@section('title','Edit Commodity')

@section('content')
    <div class="card card-xxl-stretch mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Edit Commodity</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
        <form action="{{ route('dashboard.commodities.update', $commodity) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mb-7">
                <label class="fs-6 fw-bold mb-2" for="name">Name</label>
                <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" id="name" name="name" value="{{ $commodity->name }}" required>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('name') }}
                    </span>
                @endif
            </div>

            <div class="row mb-7">    
                <div class="form-group col-md-6">
                    <label class="fs-6 fw-bold mb-2" for="category_id">Category</label>
                    <select class="form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }}" id="category_id" name="category_id" required>
                        @foreach ($categories as $category)
                            <option @if($category->id == $commodity->subCategory->category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('category_id'))
                        <span class="invalid-feedback" role="alert">
                            {{ $errors->first('category_id') }}
                        </span>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label class="fs-6 fw-bold mb-2" for="sub_category_id">Sub Category</label>
                    <select class="form-control {{ $errors->has('sub_category_id') ? ' is-invalid' : '' }}" id="sub_category_id" name="sub_category_id" required>
                        @foreach ($subCategories as $subCategory)
                            <option @if($subCategory->id == $commodity->subCategory->category->id) selected @endif value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('sub_category_id'))
                        <span class="invalid-feedback" role="alert">
                            {{ $errors->first('sub_category_id') }}
                        </span>
                    @endif
                </div>
            </div>

            <div class="row mb-7">
                <div class="form-group col-md-6">
                    <label class="fs-6 fw-bold mb-2" for="quantity">Quantity</label>
                    <input class="form-control {{ $errors->has('quantity') ? ' is-invalid' : '' }}" type="number" id="quantity" name="quantity" value="{{ $commodity->quantity }}" required>
                    @if ($errors->has('quantity'))
                        <span class="invalid-feedback" role="alert">
                            {{ $errors->first('quantity') }}
                        </span>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label class="fs-6 fw-bold mb-2" for="price">Unit Price</label>
                    <input class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}" type="number" id="price" name="price" value="{{ $commodity->price }}" required>
                    @if ($errors->has('price'))
                        <span class="invalid-feedback" role="alert">
                            {{ $errors->first('price') }}
                        </span>
                    @endif
                </div>
            </div>
            
            <div class="form-group mb-7">
                <label class="fs-6 fw-bold mb-2" for="cover_image">Cover Image</label>
                <input class="form-control {{ $errors->has('cover_image') ? ' is-invalid' : '' }}" type="file" id="cover_image" name="cover_image" value="{{ old('cover_image') }}">
                @if ($errors->has('cover_image'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('cover_image') }}
                    </span>
                @endif
            </div>

            <div class="form-group mb-7 mb-2">
                <button class="btn btn-primary btn-block" type="submit">Edit Commodity
                </button>
            </div>
        </form>
        </div>
        <!--end::Body-->
    </div>
@endsection
