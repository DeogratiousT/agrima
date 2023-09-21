@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
    <!-- Title
	============================================= -->
	<section id="page-title" class="page-title-pattern">

		<div class="container clearfix text-white">
			<h1 class="text-white">Forgot Password</h1>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Forgot Password</li>
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
                                <form class="mb-0" method="post" action="{{ route('password.email') }}">
                                    @csrf
        
                                    <h3 class="mb-4 fs-2">Password <span data-animate="svg-underline-animated"
                                        class="svg-underline nocolor svg-underline-animated animated"> Reset</span></h3>

                                    @include('dashboard.includes.messages')
        
                                    <div class="row">
                                        <div class="col-12 form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" id="email" name="email" value="" class="form-control @error('email') border border-danger @enderror">
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
        
                                        <div class="col-12 form-group">
                                            <button class="button button-3d button-black m-0">Email Password Reset Link</button>
                                        </div>
                                    </div>
        
                                </form>

                                <div class="text-dark mt-4">
                                    Back to 
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