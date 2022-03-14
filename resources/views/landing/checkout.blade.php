@extends('layouts.app')

@section('content')
    <!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>Checkout</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<div class="mt-150 mb-150">
		<div class="container">
            <div class="row">
				<div class="col-lg-8">
					<form action="">
						<div class="checkout-accordion-wrap">
							<div class="accordion" id="accordionExample">
							<div class="card single-accordion">
								<div class="card-header" id="headingOne">
								<h5 class="mb-0">
									<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									Billing Address
									</button>
								</h5>
								</div>

								<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
									<div class="card-body">
										<div class="billing-address-form form-group">
											<label for="name">Name</label>
											<input name="name" class="form-control" type="text" value="{{ Auth::user()->name }}">
											
											<label for="Email">Email</label>
											<input name="email" class="form-control" type="email" value="{{ Auth::user()->email }}">

											<label for="address">Address</label>
											<input name="address" class="form-control" type="text" placeholder="Address">

											<label for="phone_number">Phone Number</label>
											<input name="phone_number" class="form-control" type="tel" placeholder="Phone">

											<label for="notes">Say Something</label>
											<textarea class="form-control" name="notes" id="notes" cols="30" rows="10" placeholder="Say Something"></textarea>
										</div>
									</div>
								</div>
							</div>
							{{-- <div class="card single-accordion">
								<div class="card-header" id="headingTwo">
								<h5 class="mb-0">
									<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									Shipping Address
									</button>
								</h5>
								</div>
								<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
								<div class="card-body">
									<div class="shipping-address-form form-group">
										<label for="name">Name</label>
											<input name="name" class="form-control" type="text" value="{{ Auth::user()->name }}">
											
											<label for="Email">Email</label>
											<input name="email" class="form-control" type="email" value="{{ Auth::user()->email }}">

											<label for="address">Address</label>
											<input name="address" class="form-control" type="text" placeholder="Address">

											<label for="phone_number">Phone Number</label>
											<input name="phone_number" class="form-control" type="tel" placeholder="Phone">
									</div>
								</div>
								</div>
							</div> --}}
							<div class="card single-accordion">
								<div class="card-header" id="headingThree">
									<h5 class="mb-0">
										<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
										MPESA PAYMENT
										</button>
									</h5>
								</div>
								<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
								<div class="card-body">
									<div class="card-details">
										<p class="mt-2">
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
														<input id="phone" type="number" name="number" class="form-control form-control-minimal" placeholder="7xxxxxxxx" required="" value="795615409">                           
													</div>
													
												</div>
											</div>
											<input type="hidden" name="amountToPay" id="amountToPay" value="{{ $total }}">

											<div class="col-md-12 mb-3 p-0">
												<button id="mpesa-button" type="button" class="btn btn-primary" disabled data-toggle="modal" data-target="#staticBackdrop">Pay Now
												</button>
											</div>
											<!-- Modal -->
											<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
												<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
													<h3 class="modal-title" id="staticBackdropLabel">Confirm Payment</h3>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
													</div>
													<div class="modal-body">
														<p id="stk-r" class="badge badge-info p-2 mb-3"></p>
														<p>
															By clicking Proceed to Pay, <strong> KES {{ $total }}</strong> will   be deducted from your account to KIW. <br> Check your phone and enter your M-Pesa PIN when prompted.
														</p> 
														
														<button type="submit" class="btn btn-primary" id="stkpush">Proceed to Pay</button>
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
					</form>
				</div>

				<div class="col-lg-4">
					<div class="order-details-wrap">
						<table class="order-details">
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
									<td>Subtotal</td>
									<td>{{ $total }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
        </div>
    </div>  
@endsection

@push('scripts')
<script src="{{ asset('js/app.js') }}"></script>
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