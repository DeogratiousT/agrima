@extends('layouts.app')

@section('content')
    <!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>Cart</h1>
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

	@if(session('error'))
        <div class="alert alert-danger mt-1">
            {{session('error')}}
        </div>
    @endif

	<div class="mt-150 mb-150">
		<div class="container">
			<div class="cart-section mt-150 mb-150">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="cart-table-wrap">
								<table class="cart-table">
									<thead class="cart-table-head">
										<tr class="table-head-row">
											<th class="product-image">Product Image</th>
											<th class="product-name">Name</th>
											<th class="product-price">Price</th>
											<th class="product-quantity">Quantity</th>
											<th class="product-total">Total</th>
											<th class="product-remove"></th>
										</tr>
									</thead>
									<tbody>
										@php
											$total = 0;
										@endphp
										@foreach ((array) session('cart') as $slug => $details)
											@php
												$total += $details['price'] * $details['quantity'];
											@endphp
											<tr class="table-body-row">
												<td class="product-image">
													<img src="{{ asset('uploads/commodities/commmodity-images/'. $details['cover_image']) }}" alt="">
												</td>
												<td class="product-name">
													{{ $details['name'] }}
												</td>
												<td class="product-price">
													{{ $details['price'] }}
												</td>
												<td class="product-quantity">
													<a href="{{ route('cart.decrement', $slug) }}"><i class="fas fa-minus"></i></a> &nbsp;
													<span class="border border-dark p-2">{{ $details['quantity'] }}</span> &nbsp;
													<a href="{{ route('cart.increment', $slug) }}"><i class="fas fa-plus"></i></a>
												</td>
												<td class="product-total">
													{{ $details['price'] * $details['quantity'] }}
												</td>
												<td class="product-remove">
													<a href="{{ route('cart.remove', $slug) }}">
														<i class="fas fa-trash text-danger" style="font-size: 1.5rem;"></i>
													</a>
												</td>
											</tr>
										@endforeach
										<tr>
											<td colspan="5"><strong>SUB TOTAL</strong></td>
											<td><strong>{{ $total }}</strong></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="row my-4">
						<div class="col-12">
							<div class="float-left">
								<a href="{{ route('shop') }}" class="btn btn-link">
									<i class="fas fa-arrow-left"></i> Continue Shopping
								</a>
							</div>
							<div class="float-right">
								<a href="{{ route('checkout') }}" class="btn btn-primary btn-lg">
									<i class="fas fa-cart-plus"></i>
									Checkout
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>  
@endsection