@extends('dashboard.layouts.full')

@section('title', 'Password Reset')

@section('content')
    <form class="form w-100" method="post" action="{{ route('password.email') }}">
        @csrf

        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">Password Reset</h1>
            <!--end::Title-->
            <!--begin::Link-->
            <div class="text-gray-400 fw-bold fs-4">Forgot your Password? 
            <!--end::Link-->
            <!-- begin::Status -->
            @if (session('status'))
                <!--begin::Alert-->
                <div class="alert alert-success">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column">
                        <!--begin::Content-->
                        <span>{{ session('status') }}</span>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Alert-->
            @endif
            <!-- end::Status -->
        </div>
        <!--begin::Heading-->
        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Label-->
            <label class="form-label fs-6 fw-bolder text-dark">Email</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input class="form-control form-control-lg form-control-solid" type="text" name="email" autocomplete="off" value="{{ old('email') }}"/>
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Actions-->
        <div class="text-center">
            <!--begin::Submit button-->
            <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                <span class="indicator-label">Email Password Reset Link</span>
                <span class="indicator-progress">Please wait... 
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>
        <!--end::Actions-->
    </form>        
@endsection