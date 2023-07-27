@extends('layouts.app')

@section('content')
    <!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>Get in Touch</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

    @if(session('success'))
        <div class="alert alert-success mt-1">
            {{session('success')}}
        </div>
    @endif

	<div class="mt-150 mb-150">
		<div class="container">
            <!-- contact form -->
            <div class="contact-from-section mt-150 mb-150">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-title">
                                <h2>We would love to hear from you.</h2>
                                <p>If you want to buy or sell agricultural produce through Agrima or want to work with us then please drop us a line.</p>
                            </div>
                            <div id="form_status"></div>
                            <div class="contact-form">
                                <form method="POST" action="{{ route('contact.store') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="first_name">First Name</label>
                                            <input type="text" class="form-control form-control-lg @error('first_name') is-invalid @enderror" name="first_name" id="first_name" placeholder="" value="{{ old('first_name') }}" @error('first_name') autofocus @enderror required>
                                            @error('first_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" class="form-control form-control-lg @error('last_name') is-invalid @enderror" name="last_name" id="last_name" value="{{ old('last_name') }}" @error('last_name') autofocus @enderror required>
                                            @error('last_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="email">Your Email</label>
                                            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" @error('email') autofocus @enderror required>
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="phone_number">Your Phone Number</label>
                                            <input type="text" class="form-control form-control-lg @error('phone_number') is-invalid @enderror" name="phone_number" id="phone_number" placeholder="" value="{{ old('phone_number') }}" @error('phone_number') autofocus @enderror required>
                                            @error('phone_number')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone_number">Your Message</label>
                                        <textarea class="form-control form-control-lg @error('message') is-invalid @enderror" name="message" id="message" @error('message') autofocus @enderror required>
                                            {{ old('message') }}
                                        </textarea>
                                        @error('message')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end contact form -->

            <!-- find our location -->
            <div class="find-location blue-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <p> <i class="fas fa-map-marker-alt"></i> Find Our Location</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end find our location -->

            <!-- google map section -->
            <div class="embed-responsive embed-responsive-21by9">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d255282.35853768143!2d36.70730733512374!3d-1.302861788416967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f1172d84d49a7%3A0xf7cf0254b297924c!2sNairobi!5e0!3m2!1sen!2ske!4v1640040540531!5m2!1sen!2ske" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <!-- end google map section -->
        </div>
    </div>  
@endsection