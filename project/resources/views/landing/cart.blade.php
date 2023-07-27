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
										@foreach ($items as $item)
											<tr class="table-body-row" id="tr-{{ $item['commodity']['slug'] }}">
												<td class="product-image">
													<img src="https://agrimastoragefilesbucket.s3.af-south-1.amazonaws.com/commodity-images/{{ $item['commodity']['cover_image'] }}" alt="">
												</td>
												<td class="product-name">
													{{ $item['commodity']['name'] }}
												</td>
												<td class="product-price">
													{{ $item['commodity']['price'] }}
												</td>
												<td class="product-quantity">
													<form id="form-{{ $item['commodity']['slug'] }}">
														<input type="number" name="{{ $item['commodity']['slug'] }}" id="{{ $item['commodity']['slug'] }}" value="{{ $item['quantity'] }}" min="1" onchange="updateQuantity({{ $item['commodity'] }} , {{ $item['quantity'] }})">
													</form>
												</td>
												<td class="product-total" id="price-{{ $item['commodity']['slug'] }}">
													{{ $item['price'] }}
												</td>
												<td class="product-remove">
													<button class="btn btn-link" data-toggle="modal" data-target="#deleteModal{{ $item['commodity']['id'] }}">
														<i class="fas fa-trash text-danger" style="font-size: 1.5rem;"></i>
													</button>
												</td>
											</tr>

											<!-- Delete Modal -->
											<div class="modal fade" id="deleteModal{{ $item['commodity']['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">Remove {{ $item['commodity']['name'] }}</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<p>
																Deleting this product removes it from your current cart. <br>
																Do you still wish to proceed removing this product?
															</p>

															<div class="float-right">
																<button type="button" class="btn btn-danger" onclick="removeItem({{ $item['commodity'] }})">Remove {{ $item['commodity']['name'] }}</button>
															</div>
														</div>
													</div>
												</div>
											</div>
											{{-- End Delete modal --}}

										@endforeach
										<tr>
											<td colspan="3"><strong>SUB TOTAL</strong></td>
											<td id="total-price"><strong>{{ $total }}</strong></td>
											<td></td>
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
								<div class="float-right">
									<a href="{{ route('checkout') }}" class="btn btn-primary btn-lg">
										<i class="fas fa-shopping-cart"></i>
										Checkout
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>		
    </div>  
@endsection

@push('scripts')
	<script src="{{ asset('assets/js/app.js') }}"></script> 
	<script>
		function updateQuantity(item, currentQuantity){
			let newQuantity = document.getElementById(item.slug).value;
			
			const requestBody = {
				slug : item.slug,
				newQuantity : newQuantity,
			}

			if (currentQuantity != newQuantity) {
				axios.post("{{ route('cart.update') }}", requestBody)
				.then((response) => {
					if (response.data.itemSlug == item.slug) {
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

		function removeItem(item){
			event.preventDefault();

			const requestBody = {
				slug : item.slug,
			}

			axios.post("{{ route('cart.remove') }}", requestBody)
			.then((response) => {
				console.log(response.data);
				if (response.data.itemSlug == item.slug) {
					$('#deleteModal').modal('toggle');
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