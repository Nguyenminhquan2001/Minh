@if(Session::has("cart") != null)
<div class="select-items">
	<table>
		<tbody>
			@foreach(Session::get("cart")->items as $cart )
			<tr>
				<td class="si-pic"><img src="../Uploads/{{$cart['ten_san_pham']->image}}" width="70px" height="70px" alt=""></td>
				<td class="si-text">
					<div class="product-selected">
						 @if($cart['ten_san_pham']->GiaKM==0)
						<p>{{number_format($cart['ten_san_pham']->Giasp)}}₫ x{{$cart['qty']}} </p>
						@else
						<p>{{number_format($cart['ten_san_pham']->GiaKM)}}₫ x{{$cart['qty']}} </p>
						@endif
						<h6>{{$cart['ten_san_pham']->Tensanpham}}</h6>
					</div>
				</td>
				<td class="si-close">
					<i class="ti-close" data-id="{{$cart['ten_san_pham']->id}}"></i>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div class="select-total">
	<span>total:</span>
	<h5>{{number_format(Session::get("cart")->totalPrice)}}₫</h5>
	<input hidden id="total-quanty-cart" type="number" name="" value="{{Session::get('cart')->totalQty}}">
</div> 


@endif
