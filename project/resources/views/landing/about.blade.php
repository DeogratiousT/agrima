@extends('layouts.app')

@section('content')
<!-- Title
============================================= -->
<section id="page-title" class="page-title-pattern">

    <div class="container clearfix text-white">
        <h1 class="text-white">About Us</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">About Us</li>
        </ol>
    </div>

</section> <!-- #title end -->

<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container">
            <div class="section-title text-center">
                <h3 class="mb-3">Brief <span data-animate="svg-underline-animated"
                        class="svg-underline nocolor svg-underline-animated animated">About</span> Agrima</h3>
                <div class="row justify-content-center text-center">
                    <div class="col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                        <p class="text-dark">
                            Agrima is a marketplace where producers and vendors reach new markets, get access to
                            affordable quality products conveniently passing on the benefits to final consumers by
                            reducing wastage and eliminating the need for a chain of intermediaries
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row h-100">
            <div class="col-md-6 px-6 pt-5 d-flex justify-content-end">
                <img src="{{ asset('assets/images/about2.png') }}" style="height:100%" class="img-fluid rounded" alt="">
            </div>
            <div class="col-md-6">
                <div class="pe-5">
                    <h3>Our <span data-animate="svg-underline-animated"
                            class="svg-underline nocolor svg-underline-animated animated">Story</span></h3>
                    <p class="text-dark mb-2" style="text-align: justify;">
                        75% of Kenya’s population are directly involved in agribusiness for their survival and many
                        depend on it as a single source of earning. The Kenyan food processing industry accounts for 32%
                        of the country’s total food market, making it one of the largest growing sectors in Kenya and is
                        ranked first in terms of production, consumption, export, and expected growth.
                    </p>

                    <p class="text-dark mb-2" style="text-align: justify;">
                        Despite this, largely it is seen to be unorganized in the way business is conducted. There is
                        overdependence on physical markets for the conduct of large business transactions and is plagued
                        with complaints of exploitation of poor and marginal farmers who often feel cheated of a fair
                        price for their produce. Often, they not even recover their input costs, resulting in their
                        losing faith in the prevalent system. Therefore, there is a definite need to address this
                        problem comprehensively resulting in the launch of our digitized marketplace initiative.
                    </p>

                    <p class="text-dark mb-2" style="text-align: justify;">
                        Agrima.co.ke comprises a group of seasoned professionals from the Agricultural ,Finance and
                        Logistics sectors who understand the present scenario of agriculture in Kenya. We want to bring
                        innovation & technology into this business by creating a digital marketplace for both, sellers
                        and buyers of agricultural produce, to have a fair deal based on quality and quantity traded.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section> <!-- #content end -->

<!-- Mission
	============================================= -->
<section id="content">
    <div class="content-wrap bg-color-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="card">
						<div class="card-body">
							<div class="accordion accordion-bg" data-collapsible="true">
								<div class="accordion-header">
									<div class="accordion-icon">
										<i class="accordion-closed icon-ok-circle"></i>
										<i class="accordion-open icon-remove-circle"></i>
									</div>
									<div class="accordion-title">
										Our Vision
									</div>
								</div>
								<div class="accordion-content" style="display: none;">
									<p class="text-dark">
										To create a digital marketplace using the best that technology can offer and involve the best minds from the agribusiness sector to address all pain points of stakeholders across the value chain from production to consumption
									</p>
								</div>

								<div class="accordion-header">
									<div class="accordion-icon">
										<i class="accordion-closed icon-ok-circle"></i>
										<i class="accordion-open icon-remove-circle"></i>
									</div>
									<div class="accordion-title">
										What we do?
									</div>
								</div>
								<div class="accordion-content" style="display: none;">
									<p class="text-dark">
										Our mission is to grow into a trusted platform providing the right services in Kenya and be recognized as a trusted partner and leader in the agricultural business space.
									</p>
								</div>

								<div class="accordion-header">
									<div class="accordion-icon">
										<i class="accordion-closed icon-ok-circle"></i>
										<i class="accordion-open icon-remove-circle"></i>
									</div>
									<div class="accordion-title">
										What we Do
									</div>
								</div>
								<div class="accordion-content" style="display: none;">
									<p class="text-dark">
										We have endeavored through Agrimar.co.ke to digitize the entire supply chain involved in agribusiness in Kenya and revitalize the online agriculture market through the provision of agility, transparency with proof of origin and authenticity along traceability and audit trail of all transactions carried on this platform. This will boost the confidence of the trading community that wants a fair deal for the money spent or earned. <br>	It is our honest work ethic to create a platform of choice with ease of use to all who believe in having a seamless experience across the value chain be it, Buyers, Sellers or transporters doing deliveries in Kenya.
									</p>
								</div>

								<div class="accordion-header">
									<div class="accordion-icon">
										<i class="accordion-closed icon-ok-circle"></i>
										<i class="accordion-open icon-remove-circle"></i>
									</div>
									<div class="accordion-title">
										What to Expect
									</div>
								</div>
								<div class="accordion-content" style="display: none;">
									<p class="text-dark">
										Our esteemed clients and business partners can count on us to provide through this Agri digital marketplace a unique and unforgettable experience of seamless well-informed agricultural trade across the value chain with fewer overheads and total end-to-end visibility and transparency.
									</p>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</section> <!-- #content end -->

@endsection