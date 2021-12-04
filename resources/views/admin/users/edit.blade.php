@extends('dashboard.layouts.app')

@section('title','Users')

@section('content')
    <div class="card card-xxl-stretch mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Edit User</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="form-group col-md-12 mb-7">
                    <label class="fs-6 fw-bold mb-2" for="name">First Name</label>
                    <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" id="name" name="name" value="{{ $user->name }}" required>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            {{ $errors->first('name') }}
                        </span>
                    @endif
                </div>
            
            <div class="row">
                <div class="form-group col-md-6 mb-7">
                    <label class="fs-6 fw-bold mb-2" for="email">Email</label>
                    <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" id="email" name="email" value="{{ $user->email }}" required>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            {{ $errors->first('email') }}
                        </span>
                    @endif
                </div>

                <div class="form-group col-md-6 mb-7">
                    <label class="fs-6 fw-bold mb-2" for="role_id">Role</label>
                    <select class="form-control {{ $errors->has('role_id') ? ' is-invalid' : '' }}" id="role_id" name="role_id">
                        @foreach ($roles as $role)
                            <option @if($user->role_id == $role->id) selected @endif value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('role_id'))
                        <span class="invalid-feedback" role="alert">
                            {{ $errors->first('role_id') }}
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group mb-7 mb-2">
                <button class="btn btn-primary btn-block" type="submit">Edit User
                </button>
            </div>
        </form>
        </div>
        <!--end::Body-->
    </div>
@endsection

