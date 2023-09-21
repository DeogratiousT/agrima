@extends('layouts.app')

@section('content')
    <!-- Title
	============================================= -->
	<section id="page-title" class="page-title-pattern">

		<div class="container clearfix text-white">
			<h1 class="text-white">Checkout</h1>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Checkout</li>
			</ol>
		</div>

	</section> <!-- #title end -->

	<!-- Content
    ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <!-- Checkout
				============================================= -->
				<div id="checkout" class="section my-0 pt-0">
					<div class="container">
						<div class="container clearfix p-5">
							{{-- <h3 class="mb-3 mt-0 text-center">Shopping <span data-animate="svg-underline-animated"
								class="svg-underline nocolor svg-underline-animated animated">Cart</span>
							</h3> --}}

							<div id="success-alert" class="alert alert-dismissible alert-success d-none">
								<i class="icon-cart-plus"></i> &nbsp; <span id="success-message"></span>
								<button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-hidden="true"></button>
							</div>

							<div id="info-alert" class="alert alert-dismissible alert-info d-none">
								<i class="icon-cart-plus"></i> &nbsp; <span id="info-message"></span>
								<button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-hidden="true"></button>
							</div>

							<div id="error-alert" class="alert alert-dismissible alert-danger d-none">
								<i class="icon-cart-plus"></i> &nbsp; <span id="error-message"></span>
								<button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-hidden="true"></button>
							</div>

							<div class="row">
								<div class="col-lg-8">
									<div class="accordion accordion-bg" data-collapsible="true">
	
										<div class="accordion-header">
											<div class="accordion-icon">
												<i class="accordion-closed icon-ok-circle"></i>
												<i class="accordion-open icon-remove-circle"></i>
											</div>
											<div class="accordion-title">
												Billing Address
											</div>
										</div>
										<div class="accordion-content">
											<div class="billing-address-form form-group">
												<div class="row">
													<div class="col-md-6">
														<label for="name">Name</label>
														<input name="name" class="form-control" type="text" value="{{ Auth::user()->name }}">
													</div>
		
													<div class="col-md-6">
														<label for="Email">Email</label>
														<input name="email" class="form-control" type="email" value="{{ Auth::user()->email }}">
													</div>
												</div>
		
												<div class="row">
													<div class="col-md-6">
														<label for="address">Address</label>
														<input name="address" class="form-control" type="text" placeholder="Address">
													</div>
		
													<div class="col-md-6">
														<label for="phone_number">Phone Number</label>
														<input name="phone_number" class="form-control" type="tel" placeholder="Phone">
													</div>
												</div>
		
												<div class="row">
													<div class="col-12">
														<label for="notes">Say Something</label>
														<textarea class="form-control" name="notes" id="notes" placeholder="Say Something"></textarea>
													</div>
												</div>
		
											</div>
										</div>
		
										<div class="accordion-header">
											<div class="accordion-icon">
												<i class="accordion-closed icon-ok-circle"></i>
												<i class="accordion-open icon-remove-circle"></i>
											</div>
											<div class="accordion-title">
												Mpesa  Payment
											</div>
										</div>
										<div class="accordion-content">
											<div class="text-dark">
												<p class="mt-2 text-dark">
													Before proceeding, ensure that; <br>
													<br>1. Your phone number registered with M-Pesa is turned on.
													<br>2. You have enough funds (a <strong> minimum of KES {{ $total }}</strong>) in your M-Pesa.
												</p>                                            
												<form class="row mt-3 col" method="" action="">
													@csrf              
													<div class="col-md-12 mb-3 p-0">                                                
														<div class="form-wrapper">
															<div class="input-group">
																<input id="phone-prefix" type="text" name="phone-prefix" value="+254" class="form-control form-control-minimal" placeholder="+254" disabled style="max-width: 15%;">                             
																<input id="phone" type="number" name="number" class="form-control form-control-minimal" placeholder="7xxxxxxxx" required="" value="">                         
															</div>
															
														</div>
													</div>
													<input type="hidden" name="amountToPay" id="amountToPay" value="{{ $total }}">
		
													<div class="col-md-12 mb-3 p-0">
														<button id="mpesa-button" type="button" class="btn btn-success" disabled data-bs-toggle="modal" data-bs-target="#mpesaModal">Pay Now
														</button>
													</div>
												</form>
											</div>
										</div>
		
									</div>
								</div>
	
								<div class="col-lg-4">
									<div class="order-details-wrap">
										<table class="table table-stripped order-details">
											<thead>
												<tr>
													<th>Product</th>
													<th>Price</th>
												</tr>
											</thead>
											<tbody class="order-details-body">
												@foreach ($items as $item)
													<tr>
														<td>{{ $item['commodity']['name'] }}</td>
														<td>{{ $item['price'] }}</td>
													</tr>
												@endforeach
											</tbody>
											<tbody class="checkout-details">
												<tr>
													<th>Subtotal</th>
													<th>{{ $total }}</th>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div><!-- #cart end -->

				<div id="checkout-modal" class="modal fade" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="myModalLabel">CHECKOUT</h4>
								<button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
							</div>
							<div class="modal-body">
								<div class="p-4">
									<div id="checkout-alert" class="alert alert-dismissible d-none">
										<i class="icon-cart-plus"></i> &nbsp; <span id="checkout-alert-message"></span>
										<button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-hidden="true"></button>
									</div>
			
									<form class="mb-0" id="checkout_form" action="{{ route('checkout') }}" method="POST">
										@csrf
			
										<div class="row row-cols-1 row-cols-md-2 g-4">
											<div class="col">
												<div class="card bg-light h-100">
													<div class="card-body">
														<div class="p-2">
															<h3 class="text-dark">Step 1: Fill in Your Details</h3>
			
															<input type="hidden" name="details" id="details" value="">
					
															<div class="form-group">
																<label for="name" class="text-dark">Name <small>*</small></label>
																<input type="text" id="name" name="name" value="" class="text-dark sm-form-control required">
															</div>
							
															<div class="form-group">
																<label for="email" class="text-dark">Email <small>*</small></label>
																<input type="email" id="email" name="email" value="" class="required email text-dark sm-form-control">
															</div>
							
															<div class="form-group">
																<label for="phone" class="text-dark">Phone <small>*</small></label>
																<input type="text" id="phone" name="phone" value="" class="text-dark sm-form-control">
															</div>
							
															<div class="form-group pt-2 text-center">
																<button name="submit" type="submit" tabindex="5" value="Submit" class="button button-3d m-0 text-dark" onclick="checkout(event)">
																	<span id="checkout-spinner" class="d-none mr-4 spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
																	Submit Comment
																</button>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col">
												<div class="card bg-light h-100">
													<div class="card-body">
														<div class="p-2">
															<h3 class="text-dark">Step 2: Make Payment</h3>
						
															<p class="mb-1"><strong>Follow the Instructions Below:</strong></p>
															<ol>
																<li>Go to Your Mpesa and Select <strong>Paybill Option</strong></li>
																<li>Use the <strong>Paybill / Business Number : 542542 </strong> and Proceed</li>
																<li>Use the <strong>Account Number : 02803397512250 </strong> and Proceed</li>
																<li><strong>Pay KES <span id="payment-amount">0</span></strong> for your Merchandise</li>
																<li>Confirm that the Account Name you are paying to is <strong>TRANS NZOIA HUB</strong></li>
																<li>Complete Transaction</li>
															</ol>
															<p class="text-danger">As soon As you make your Payment, One of our Secretariat Members will Reach Out to You</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

            </div>
        </div>
    </section> <!-- #content end -->
	
	<!-- MPESA Modal -->
	<div class="modal fade" id="mpesaModal" tabindex="-1" aria-labelledby="mpesaModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			<h3 class="modal-title" id="mpesaModalLabel">Confirm Payment</h3>
			<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body text-dark">
				<p id="stk-r" class="badge bg-info p-2 mb-3"></p>
				<p class="text-dark">
					By clicking Proceed to Pay, <strong> KES {{ $total }}</strong> will   be deducted from your account to KIW. <br> Check your phone and enter your M-Pesa PIN when prompted.
				</p> 
				
				<button type="submit" class="btn btn-success" id="stkpush">Proceed to Pay</button>
			</div>                                                
		</div>
		</div>
	</div>
  
@endsection

@push('scripts')
<script src="{{ asset('assets/js/app.js') }}"></script>
	<script>
		$(document).ready(function(){
        //set button to disabled onload
        $('#mpesa-button').attr('disabled',true);

        //check input
        $('#phone').keyup(function(){

            //if content un-disable
            if($(this).val().length >= 7)
                $('#mpesa-button').attr('disabled', false); 

            //if untype disable           
            else
                $('#mpesa-button').attr('disabled',true);
        })
    });

	document.getElementById('stkpush').addEventListener('click', (event) => {
        event.preventDefault();

        let sphone = 254 + document.getElementById('phone').value;

        const requestBody = {
            amount : document.getElementById('amountToPay').value,
            phone : sphone.replace(/ /g, ""),
        }

        axios.post("{{ route('stkpush') }}", requestBody)
        .then((response) => {
            if (response.data.ResponseDescription) {
                document.getElementById('stk-r').innerHTML = 'Enter Your Mpesa PIN prompted on your phone';
            }else{
                document.getElementById('stk-r').innerHTML = response.data.errorMessage;
            }
        })
        .catch((error) => {
            console.log(error);
        })
    });
	</script>
@endpush