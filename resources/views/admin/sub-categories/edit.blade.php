@extends('dashboard.layouts.app')

@section('title','Edit Sub Category')

@section('content')
    <div class="card card-xxl-stretch mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Edit Sub Category</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
        <form action="{{ route('dashboard.sub-categories.update', $subCategory) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mb-7">
                <label class="fs-6 fw-bold mb-2" for="name">Name</label>
                <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" id="name" name="name" value="{{ $subCategory->name }}" required>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('name') }}
                    </span>
                @endif
            </div>

            <div class="form-group mb-7">
                <label class="fs-6 fw-bold mb-2" for="category_id">Category</label>
                <select class="form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }}" id="category_id" name="category_id" required>
                    @foreach ($categories as $category)
                        <option @if($category->id == $subCategory->category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('category_id'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('category_id') }}
                    </span>
                @endif
            </div>
            
            <div class="form-group mb-7">
                <label class="fs-6 fw-bold mb-2" for="cover_image">Cover Image</label>
                <input class="form-control {{ $errors->has('cover_image') ? ' is-invalid' : '' }}" type="file" id="cover_image" name="cover_image" value="{{ $subCategory->cover_image }}">
                @if ($errors->has('cover_image'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('cover_image') }}
                    </span>
                @endif
            </div>

            <div class="form-group mb-7 mb-2">
                <button type="submit" id="kt_button" class="btn btn-primary btn-block">
                    <span class="indicator-label">Edit Sub Category</span>
                    <span class="indicator-progress">Please wait... 
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
        </form>
        </div>
        <!--end::Body-->
    </div>
@endsection
