<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" title="style" href="assets/dest/css/style.css">
	<link rel="stylesheet" href="assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="assets/dest/css/huong-style.css">
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
    <div class="container">
        <hr>
        <form role="form" action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="row" style="background-color:pink; color: white; font-size: 50px;">
           <center>  @if(Session::has('thongbao'))
             {{Session::get('thongbao')}}
              @endif
                </center>
            </div>
            <div class="row">
                <aside class="col-sm-6">
                    <p style="text-align:center; font-size: 40px;"> Thông tin hóa đơn</p>
                    <article class="card">
                        <div class="card-body p-5">

                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Họ</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="ho" placeholder=""
                                            required="required">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Tên</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="ten" placeholder=""
                                            required="required">
                                    </div>
                                </div>
                            </div> <!-- /hoten-->
                            <div class="row">
                                <label for="">Email</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="email1" placeholder="Nhập Email"
                                        required="required">
                                </div>
                            </div> <!-- /email-->
                            <div class="row">
                                <label for="">Số Điện Thoại</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="sdt" placeholder="Nhập số điện thoại"
                                        required="required">
                                </div>
                            </div> <!-- /SĐT-->
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Tỉnh/Thành Phố</label>
                                    <div class="input-group">

                                        <input type="text" class="form-control" name="tinh" placeholder="" required="">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Quận/Huyện</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="huyen" placeholder="" required="">
                                    </div>
                                </div>

                            </div> <!-- /Tinhthanhpho -->
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Phường/Xã</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="phuong" placeholder=""
                                            required="">
                                    </div>
                                </div>
                            </div><!-- phuongxa -->
                            <div class="form-group">
                                <label for="">Địa chỉ số nhà</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="diachi"
                                        placeholder="Nhập địa chỉ giao hàng">
                                </div>
                            </div> <!-- diachi -->
                            <div class="form-group">
                                <label for="">Note</label>
                                <div class="input-group">
                                    <textarea type="text" class="form-control" name="note" placeholder=""
                                        rows="8"></textarea>
                                </div>
                            </div> <!-- note -->
                        </div> <!-- card-body.// -->
                    </article> <!-- card.// -->
                </aside> <!-- col.// -->
                <aside class="col-sm-6">
                    <p style="text-align:center; font-size: 40px;"> Thông tin hóa đơn</p>
                    <div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
										</div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 999 999 999
											<br>- Chủ TK: Nguyễn Minh Quân
											<br>- Ngân hàng MB, Chi nhánh Hà Nội
										</div>						
									</li>
									
								</ul>
							</div>
                </aside> <!-- col.// -->
            </div> <!-- row.// -->



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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(Session::has("cart") != null)
                                        @foreach(Session::get("cart")->items as $cart )
                                        <tr>

                                            <td class="cart-pic first-row"><img
                                                    src="Uploads/{{$cart['ten_san_pham']->image}}" width="120px"
                                                    height="120px" alt=""></td>
                                            <td class="cart-title first-row">
                                                <h5>{{$cart['ten_san_pham']->Tensanpham}}</h5>
                                            </td>
                                            <td class="p-price first-row">
                                                {{number_format($cart['ten_san_pham']->Giasp)}}</td>
                                            <td class="qua-col first-row">
                                                {{$cart['qty']}}
                                            </td>
                                            <td class="total-price first-row">{{number_format($cart['price'])}}₫</td>
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
                                            <li class="subtotal">Qty <span>{{Session::get("cart")->totalQty}}</span>
                                            </li>
                                            <li class="cart-total">Total
                                                <span>{{number_format(Session::get("cart")->totalPrice)}}₫</span>
                                            </li>
                                        </ul><br><br>
                                        <center><button type="submit" class="btn btn-primary"
                                                style="background-color: blueviolet;"> Thanh toán</button></center>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form> <!-- formcheck.// -->

    </div>
    <!--container end.//-->
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
    <!-- include js files -->
	 
	
	<script src="assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	 
	<script src="assets/dest/vendors/dug/dug.js"></script>
	<script src="assets/dest/js/scripts.min.js"></script>


</body>

</html>