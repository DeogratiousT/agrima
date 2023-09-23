@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <!-- Title
	============================================= -->
	<section id="page-title" class="page-title-pattern">

		<div class="container clearfix text-white">
			<h1 class="text-white">Register</h1>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Register</li>
			</ol>
		</div>

	</section> <!-- #title end -->

    <!-- Content
    ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="row justify-content-center">
                    <div class="col-10 col-md-8 col-lg-6">
                        <div class="card mb-0">
                            <div class="card-body" style="padding: 40px;">
                                <form class="mb-0" method="post" action="{{ route('register') }}">
                                    @csrf
        
                                    <h3 class="mb-4 fs-2"><span data-animate="svg-underline-animated"
                                        class="svg-underline nocolor svg-underline-animated animated">Create </span> an Account</h3>

                                    @include('dashboard.includes.messages')
        
                                    <div class="row">
                                        <div class="col-12 form-group">
                                            <label for="role">Register As:</label>
                                            <select id="role" name="role" class="form-select @error('role') border border-danger @enderror">
                                                <option selected disabled>Choose...</option>
                                                <option value="farmer">Farmer</option>
                                                <option value="vendor">Vendor</option>
                                            </select>
                                            @error('role')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-12 col-md-6 form-group">
                                            <label for="first_name">First Name:</label>
                                            <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" class="form-control @error('first_name') border border-danger @enderror">
                                            @error('first_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 form-group">
                                            <label for="last_name">Last Name:</label>
                                            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" class="form-control @error('last_name') border border-danger @enderror">
                                            @error('last_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12 form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" id="email" name="email" value="" class="form-control @error('email') border border-danger @enderror">
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
        
                                        <div class="col-12 col-md-6 form-group">
                                            <label for="password">Password:</label>
                                            <input type="password" id="password" name="password" value="" class="form-control @error('password') border border-danger @enderror">
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-6 form-group">
                                            <label for="password_confirmation">Confirm Password:</label>
                                            <input type="password" id="password_confirmation" name="password_confirmation" value="" class="form-control @error('password_confirmation') border border-danger @enderror">
                                            @error('password_confirmation')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12 mb-2">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input @error('toc') border border-danger @enderror" id="toc" name="toc">
                                                <label class="form-check-label" for="toc">I agree <a href="{{ route('terms.conds') }}" class="ms-1 link-primary">Terms and conditions</a>.</span></label>
                                                @error('toc')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
        
                                        <div class="col-12 form-group">
                                            <button type="submit" class="button button-3d button-black m-0">Register</button>
                                        </div>
                                    </div>
        
                                </form>

                                <div class="text-dark mt-4">
                                    Already have an account? 
                                    <a href="{{ route('login') }}" class="link-success fw-bolder">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section><!-- #content end -->
@endsection