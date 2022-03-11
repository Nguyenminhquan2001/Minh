<div class="cart-table">
						<table>
							<thead>
								<tr>
									<th>Image</th>
									<th class="p-name">Product Name</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total</th>
									<th>Save</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
								@if(Session::has("cart") != null)
								@foreach(Session::get("cart")->items as $cart )
								<tr>

									<td class="cart-pic first-row"><img src="../Uploads/{{$cart['ten_san_pham']->image}}" width="120px" height="120px" alt=""></td>
									<td class="cart-title first-row">
										<h5>{{$cart['ten_san_pham']->Tensanpham}}</h5>
									</td>
									<td class="p-price first-row">{{number_format($cart['ten_san_pham']->Giasp)}}</td>
									<td class="qua-col first-row">
										<div class="quantity">
											<div class="pro-qty">
												<input type="text" id="qty-items-{{$cart['ten_san_pham']->id}}" value="{{$cart['qty']}}">
											</div>
										</div>
									</td>
									<td class="total-price first-row">{{number_format($cart['price'])}}₫</td>
									<td class="close-td first-row"><i class="ti-save" onclick="SaveListItemsCart({{$cart['ten_san_pham']->id}})"></i></td>
									<td class="close-td first-row"><i class="ti-close" onclick="DeleteListItemsCart({{$cart['ten_san_pham']->id}})"></i></td>
								</tr>
								@endforeach
								@endif
							</tbody>
						</table>
					</div>
					<div class="row">
						<div class="col-lg-4 offset-lg-8">
							<div class="proceed-checkout">
								@if(Session::has("cart") != null)
								<ul>
									<li class="subtotal">Qty <span>{{Session::get("cart")->totalQty}}</span></li>
									<li class="cart-total">Total <span>{{number_format(Session::get("cart")->totalPrice)}}₫</span></li>
								</ul>
								<a href="{{url('checkout')}}" class="proceed-btn">PROCEED TO CHECK OUT</a>
									@endif
							</div>
						</div>
					</div>