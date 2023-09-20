@extends('layouts.app')

@section('content')
    <!-- Title
    ============================================= -->
    <section id="page-title" class="page-title-pattern">

        <div class="container clearfix text-white">
            <h1 class="text-white">Contact Us</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
            </ol>
        </div>

    </section> <!-- #title end -->

    @if(session('success'))
        <div class="alert alert-success mt-1">
            {{session('success')}}
        </div>
    @endif

    <!-- Content
    ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="row align-items-stretch col-mb-50 mb-0">
                    <!-- Contact Form
                    ============================================= -->
                    <div class="col-lg-6">

                        <h3 class="mb-3 mt-0">Send Us an <span data-animate="svg-underline-animated"
                            class="svg-underline nocolor svg-underline-animated animated">Email</span>
                        </h3>

                        <div class="form-widget">

                            <div class="form-result"></div>

                            <form method="POST" action="{{ route('contact.store') }}">
                                @csrf

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="first_name">First Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="first_name" placeholder="" value="{{ old('first_name') }}" @error('first_name') autofocus @enderror required>
                                        @error('first_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="last_name">Last Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="last_name" value="{{ old('last_name') }}" @error('last_name') autofocus @enderror required>
                                        @error('last_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" @error('email') autofocus @enderror required>
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone_number">Phone Number <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" id="phone_number" placeholder="" value="{{ old('phone_number') }}" @error('phone_number') autofocus @enderror required>
                                        @error('phone_number')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="subject">Subject <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject" value="{{ old('subject') }}" @error('subject') autofocus @enderror required>
                                        @error('subject')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="phone_number">Your Message <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message" @error('message') autofocus @enderror required>
                                        {{ old('message') }}
                                    </textarea>
                                    @error('message')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="button button-3d m-0">Submit</button>
                            </form>
                        </div>

                    </div><!-- Contact Form End -->

                    <!-- Google Map
                    ============================================= -->
                    <div class="col-lg-6 min-vh-50">
                        <!-- google map section -->
                        <div class="embed-responsive embed-responsive-21by9">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d255282.35853768143!2d36.70730733512374!3d-1.302861788416967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f1172d84d49a7%3A0xf7cf0254b297924c!2sNairobi!5e0!3m2!1sen!2ske!4v1640040540531!5m2!1sen!2ske" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                        <!-- end google map section -->
                    </div><!-- Google Map End -->
                </div>
            </div>
        </div>
    </section> <!-- #content end -->

    <div class="section m-0 border-0 bg-color  bg-color-light" style="padding: 80px 0;">
        <div class="container center clearfix">

             <!-- Contact Info
                ============================================= -->
                <div class="row col-mb-50">
                    <div class="col-sm-6 col-lg-3">
                        <div class="feature-box fbox-center fbox-outline fbox-dark fbox-effect border shadow p-4 m-1">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-map-marker2"></i></a>
                            </div>
                            <div class="fbox-content">
                                <h3>Our Headquarters<span class="subtitle">Nairobi, Kenya</span></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="feature-box fbox-center fbox-outline fbox-dark fbox-effect border shadow p-4 m-1">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-phone3"></i></a>
                            </div>
                            <div class="fbox-content">
                                <h3>Speak to Us<span class="subtitle">(+254) 795 615 409</span></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="feature-box fbox-center fbox-outline fbox-dark fbox-effect border shadow p-4 m-1">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-line-mail"></i></a>
                            </div>
                            <div class="fbox-content">
                                <h3>Send an Email<span class="subtitle">support@agrima.co.ke</span></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="feature-box fbox-center fbox-outline fbox-dark fbox-effect border shadow p-4 m-1">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-twitter2"></i></a>
                            </div>
                            <div class="fbox-content">
                                <h3>Follow on Twitter<span class="subtitle">@AgrimarKe</span></h3>
                            </div>
                        </div>
                    </div>
                </div><!-- Contact Info End -->

        </div>
    </div>  
@endsection