@extends('dashboard.layouts.app')

@section('title','Edit Category')

@section('content')
    <div class="card card-xxl-stretch mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Edit Category</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
        <form action="{{ route('categories.update', $category) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mb-7">
                <label class="fs-6 fw-bold mb-2" for="name">Name</label>
                <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" id="name" name="name" value="{{ $category->name }}" required>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('name') }}
                    </span>
                @endif
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
                <button class="btn btn-primary btn-block" type="submit">Edit Category
                </button>
            </div>
        </form>
        </div>
        <!--end::Body-->
    </div>
@endsection
