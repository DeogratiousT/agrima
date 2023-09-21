@extends('layouts.app')

@section('content')
    <!-- Title
	============================================= -->
	<section id="page-title" class="page-title-pattern">

		<div class="container clearfix text-white">
			<h1 class="text-white">Shopping Cart</h1>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
			</ol>
		</div>

	</section> <!-- #title end -->

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

	<!-- Content
    ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <!-- Cart
				============================================= -->
				<div id="cart" class="section my-0 pt-0">
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

							<table class="table cart mb-5">
								<thead>
									<tr>
										<th class="cart-product-remove">&nbsp;</th>
										<th class="cart-product-thumbnail">Cover</th>
										<th class="cart-product-name">Product</th>
										<th class="cart-product-price">Unit Price</th>
										<th class="cart-product-quantity">Quantity</th>
										<th class="cart-product-subtotal">Subtotal (KES)</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($items as $item)
										<tr id="tr-{{ $item['commodity']['slug'] }}" class="cart_item">
											<td class="cart-product-remove">
												<a href="#" class="remove" title="Remove this item" data-bs-toggle="modal" data-bs-target="#remove-item-{{ $item['commodity']['slug'] }}"><i class="icon-trash2"></i></a>
											</td>
					
											<td class="cart-product-thumbnail">
												<a href="#"><img width="64" height="64" src="https://agrimastoragefilesbucket.s3.af-south-1.amazonaws.com/commodity-images/{{ $item['commodity']['cover_image'] }}" alt="{{ $item['commodity']['name'] }}"></a>
											</td>
					
											<td class="cart-product-name">
												<a href="#" id="name">{{ $item['commodity']['name'] }}</a>
											</td>
					
											<td class="cart-product-price">
												<span id="amount" class="amount">{{ $item['commodity']['price'] }}</span>
											</td>
					
											<td class="cart-product-quantity">
												<div class="quantity">
													<input type="button" value="-" class="minus">
													<input type="text" id="quantity" name="quantity" value="{{ $item['quantity'] }}" class="qty" onchange="updateQuantity(this, '{{ $item['commodity']['slug'] }}' , '{{ $item['quantity'] }}')">
													<input type="button" value="+" class="plus">
												</div>
											</td>
					
											<td class="cart-product-subtotal">
												<span id="price-{{ $item['commodity']['slug'] }}" class="amount">{{ $item['price'] }}</span>
											</td>
										</tr>  
									@endforeach

									<tr class="cart_item">
										<td colspan="5" class="cart-total">
											<span id="total" class="amount">Total (KES)</span>
										</td>
										<td class="cart-product-subtotal">
											<span id="total-price" class="amount">{{ $total }}</span>
										</td>
									</tr>
								</tbody>
							</table>
							<div class="row justify-content-end py-2 col-mb-30">
								<div class="col-lg-auto pe-lg-0">
									<a href="{{ route('shop') }}" class="button button-small button-border button-rounded button-dark">Continue Shopping</a>
									<a href="{{ route('checkout') }}" class="button button-3d mt-2 mt-sm-0 me-0 text-light">Proceed to Checkout</a>
								</div>
							</div>
						</div>
					</div>
				</div><!-- #cart end -->
				
            </div>
        </div>
    </section> <!-- #content end -->
	
	@foreach ($items as $item)
		<!-- Remove Modal -->
		<div class="modal fade" id="remove-item-{{ $item['commodity']['slug'] }}" tabindex="-1" aria-labelledby="{{ $item['commodity']['slug'] }}Label" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="{{ $item['commodity']['slug'] }}Label">{{ $item['commodity']['name'] }}</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body text-dark">
						Are You Sure that you want to Remove <strong>{{ $item['commodity']['name'] }}</strong> from Cart?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-danger" onclick="removeItem('{{ $item['commodity']['slug'] }}')">Remove</button>
					  </div>
				</div>
			</div>
		</div>
	@endforeach
@endsection

@push('scripts')
	<script src="{{ asset('assets/js/app.js') }}"></script> 
	<script>
		function updateQuantity(obj, slug, currentQuantity) {
			let newQuantity = obj.value;
			
			const requestBody = {
				slug : slug,
				newQuantity : newQuantity,
			}

			if (currentQuantity != newQuantity) {
				axios.post("{{ route('cart.update') }}", requestBody)
				.then((response) => {
					if (response.data.itemSlug == slug) {
						document.getElementById("price-" + response.data.itemSlug).innerHTML = response.data.itemPrice;
						document.getElementById('total-price').innerHTML = response.data.totalPrice;
						document.getElementById('header-total-quantity').innerHTML = response.data.totalQuantity;
						
					}
				})
				.catch((error) => {
					console.log(error);
				});
			}
		}

		function removeItem(slug){
			event.preventDefault();

			const requestBody = {
				slug : slug,
			}

			axios.post("{{ route('cart.remove') }}", requestBody)
			.then((response) => {
				console.log(response.data);
				if (response.data.itemSlug == slug) {
					$(`#remove-item-${slug}`).modal('toggle');
					document.getElementById("tr-" + response.data.itemSlug).innerHTML = "";
					document.getElementById("total-price").innerHTML = response.data.totalPrice;
					document.getElementById('header-total-quantity').innerHTML = response.data.totalQuantity;
				}
			})
			.catch((error) => {
				console.log(error);
			});
		}
	</script>
@endpush