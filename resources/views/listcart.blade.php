<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="Fashi Template">
	<meta name="keywords" content="Fashi, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Giỏ hàng</title>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

	<!-- Css Styles -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" title="style" href="css/sale.css">
	<link rel="stylesheet" href="asset/css/themify-icons.css" type="text/css">
	<link rel="stylesheet" href="asset/css/elegant-icons.css" type="text/css">
	<link rel="stylesheet" href="asset/css/style.css" type="text/css">
	<link rel="stylesheet" href="fontawesome-free-6.0.0/css/all.min.css">
</head>

<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>


	<!-- Breadcrumb Section Begin -->
	<div class="breacrumb-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumb-text product-more">
						<a href="{{route('welcome')}}"><i class="fa fa-home"></i> Home</a>
						<a href="{{url('listcart')}}">Shop</a>
					
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcrumb Section Begin -->

	<!-- Shopping Cart Section Begin -->
	<section class="shopping-cart spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-12" id="list-cart1">
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

									<td class="cart-pic first-row"><img src="../Uploads/{{$cart['ten_san_pham']->image}}"
											width="120px" height="120px" alt=""></td>
									<td class="cart-title first-row">
										<h5>{{$cart['ten_san_pham']->Tensanpham}}</h5>
									</td>
									<td class="p-price first-row">{{number_format($cart['ten_san_pham']->Giasp)}}</td>
									<td class="qua-col first-row">
										<div class="quantity">
											<div class="pro-qty">
												<input type="text" id="qty-items-{{$cart['ten_san_pham']->id}}"
													value="{{$cart['qty']}}">
											</div>
										</div>
									</td>
									<td class="total-price first-row">{{number_format($cart['price'])}}₫</td>
									<td class="close-td first-row"><i class="ti-save"
											onclick="SaveListItemsCart({{$cart['ten_san_pham']->id}})"></i></td>
									<td class="close-td first-row"><i class="ti-close"
											onclick="DeleteListItemsCart({{$cart['ten_san_pham']->id}})"></i></td>
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
									<li class="cart-total">Total
										<span>{{number_format(Session::get("cart")->totalPrice)}}₫</span></li>
								</ul>
								<a href="{{url('checkout')}} " class="proceed-btn">PROCEED TO CHECK OUT</a>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Shopping Cart Section End -->

	<!--footer -->
	<div class="container-fluid">
		<footer class="py-5">
			<div class="row">
				<div class="col-2">
					<img src="{{asset('img/logo.svg')}}" width="180px">
					<ul class="nav flex-column">
						<br>
						<li class="nav-item mb-2"> <i class="fa-solid fa-phone"></i>
							<span><a href="tel:1900565657">1900565657</a></span>
						</li>
						<br>
						<li class="nav-item mb-2">
							<i class="fa-solid fa-envelope"></i>
							<span>info@postmart.vn</span>
						</li><br>
						<li class="nav-item mb-2">
							<i class="fa-solid fa-house-chimney"></i>
							<span>Số 5, Phạm Hùng, Mỹ Đình 2, Nam Từ Liêm, Hà Nội</span>
						</li>
					</ul>
				</div>

				<div class="col-2">
					<h5>Hỗ Trợ</h5>
					<ul class="nav flex-column">
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Quy trình mua bán</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Chính sách đổi trả</a>
						</li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Quy trình giải quyết khiếu
								nại</a>
						</li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Quy định hàng hóa cấm </a>
						</li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Chính sách vận chuyển</a>
						</li>
					</ul>
				</div>

				<div class="col-2">
					<h5>Đối tác</h5>
					<ul class="nav flex-column">
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Thông tin OCOP Quốc
								Gia</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Giới thiệu về Postmart</a>
						</li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Điều khoản chung</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Quy chế hoạt động</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Cách thức đăng ký
								VietnamPostpay</a>
						</li>
					</ul>
				</div>

				<div class="col-4 offset-1">
					<form>
						<h5>Đăng ký thông tin khuyến mại</h5>

						<div class="d-flex w-100 gap-2">
							<label for="newsletter1" class="visually-hidden">Email address</label>
							<input id="newsletter1" type="text" class="form-control"
								placeholder="Nhập địa chỉ email của bạn">
							<button class="btn btn-primary" type="button">Đăng Ký</button>
						</div>
					</form>
				</div>
			</div>

			<div class="d-flex justify-content-between py-4 my-4 border-top">
				<p>Copyright © <a href="http://minh.test/">Postmart</a> 2022. All rights reserved.</p>
				<ul class="list-unstyled d-flex">
					<li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
								<use xlink:href="#twitter"></use>
							</svg></a></li>
					<li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
								<use xlink:href="#instagram"></use>
							</svg></a></li>
					<li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
								<use xlink:href="#facebook"></use>
							</svg></a></li>
				</ul>
			</div>
		</footer>
	</div>
	<!-- JavaScript -->
	<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

	<!-- CSS -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
	<!-- Default theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
	<!-- Semantic UI theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
	<!-- Bootstrap theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
	<!-- Js Plugins -->
	<script src="asset/js/jquery-3.3.1.min.js"></script>
	<script src="asset/js/bootstrap.min.js"></script>
	<script src="asset/js/jquery-ui.min.js"></script>
	<script src="asset/js/jquery.countdown.min.js"></script>
	<script src="asset/js/jquery.nice-select.min.js"></script>
	<script src="asset/js/jquery.zoom.min.js"></script>
	<script src="asset/js/jquery.dd.min.js"></script>
	<script src="asset/js/jquery.slicknav.js"></script>
	<script src="asset/js/owl.carousel.min.js"></script>
	<script src="asset/js/main.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script type="text/javascript">
		function DeleteListItemsCart(id) {
			$.ajax({
				type: "GET",
				url: 'deleteListCart/' + id,
			}).done(function (response) {
				Renderlistcart(response);
				alertify.success('Đã xóa sản phẩm khỏi giỏ hàng');
			});

		}

		function SaveListItemsCart(id) {

			$.ajax({
				type: "GET",
				url: 'saveListCart/' + id + '/' + $("#qty-items-" + id).val(),
			}).done(function (response) {
				Renderlistcart(response);
				alertify.success('Đã cập nhập sản phẩm trong giỏ hàng');
			});

		}
		function Renderlistcart(response) {
			$("#list-cart1").empty();
			$("#list-cart1").html(response);
			var proQty = $('.pro-qty');
			proQty.prepend('<span class="dec qtybtn">-</span>');
			proQty.append('<span class="inc qtybtn">+</span>');
			proQty.on('click', '.qtybtn', function () {
				var $button = $(this);
				var oldValue = $button.parent().find('input').val();
				if ($button.hasClass('inc')) {
					var newVal = parseFloat(oldValue) + 1;
				} else {
					// Don't allow decrementing below zero
					if (oldValue > 0) {
						var newVal = parseFloat(oldValue) - 1;
					} else {
						newVal = 0;
					}
				}
				$button.parent().find('input').val(newVal);
			});

		}

	</script>
</body>

</html>