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
							<div class="card single-accordion">
								<div class="card-header" id="headingTwo">
								<h5 class="mb-0">
									<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									Shipping Address
									</button>
								</h5>
								</div>
								<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
								<div class="card-body">
									<div class="shipping-address-form">
										<p>Your shipping address form is here.</p>
									</div>
								</div>
								</div>
							</div>
							<div class="card single-accordion">
								<div class="card-header" id="headingThree">
								<h5 class="mb-0">
									<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									Card Details
									</button>
								</h5>
								</div>
								<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
								<div class="card-body">
									<div class="card-details">
										<p>Your card details goes here.</p>
									</div>
								</div>
								</div>
							</div>
							</div>

						</div>
						<button type="submit" class="btn btn-primary btn-lg my-4">Place Order</button>
					</form>
				</div>

				<div class="col-lg-4">
					<div class="order-details-wrap">
						<table class="order-details">
							<thead>
								<tr>
									<th>Your order Details</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody class="order-details-body">
								<tr>
									<td>Product</td>
									<td>Total</td>
								</tr>
								@php
									$total = 0;
								@endphp
								@foreach ((array) session('cart') as $slug => $details)
								@php
									$total += $details['price'] * $details['quantity'];
								@endphp
									<tr>
										<td>{{ $details['name']}}</td>
										<td>{{ $details['price'] * $details['quantity'] }}</td>
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