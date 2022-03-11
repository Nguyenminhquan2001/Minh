<!DOCTYPE html>
<html >

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Trang Chủ</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" title="style" href="css/sale.css">
  <link rel="stylesheet" href="asset/css/themify-icons.css" type="text/css">
  <link rel="stylesheet" href="asset/css/elegant-icons.css" type="text/css">
  <link rel="stylesheet" href="asset/css/style.css" type="text/css">
  <link rel="stylesheet" href="fontawesome-free-6.0.0/css/all.min.css">
  <!-- Styles -->
        <style type="text/css">
           .navv>li{float: left; margin-right: 15px; } .navv>li>a{text-transform: uppercase; color: black; } .navv li{position: relative; list-style:none; } .navv li a{padding: 10px; line-height: 20px; display: inline-block; } .navv .sub-menu{display: none; position: absolute; top: 0; left: 100%; width: 200px; background-color: #eee; padding: 5px 20px; z-index: 999; } .navv li:hover>.sub-menu{display: block; } .navv>li>.sub-menu{top: 40px; left: 0; } 
         </style>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
</head>

<body class="antialiased ">
  <div class="container-fluid" style="background-color:#F5F5F5;">
    <div class="row">
      <div class="col-md-10 quan">
        <a href="{{route('welcome')}}"><img src="{{asset('img/logo.svg')}}  " alt="logo"></a>
      </div>
      <div class="col-md-2">
        @if (Route::has('login'))
        <div class=" hidden fixeds  top-0 right-0 px-6 py-4 sm:block ">
          @auth
           
          
            <!-- tesst menudk-->
            <ul class="navv" >
               <li>
                 <a href="{{ url('/dashboard') }}">Dashboard</a>
                 <ul class="sub-menu">
                    <li><form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form></li>
                    
                 </ul>
               </li>
</ul>
            <!-- /tesst menudk-->
          @else
          <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Đăng nhập</a>

          @if (Route::has('register'))
          <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Đăng ký</a>
          @endif
          @endauth
        </div>
      </div>
      @endif
      


      <div class="col-md-12">
        <nav class=" navbar navbar-expand-lg navbar-light bg-light ">
          <div class="container-fluid">
            <a class="navbar-brand" href="{{route('welcome')}}">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class=" collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Sản Phẩm</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('lienhe')}}">Liên Hệ</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Danh mục sản phẩm
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Quần</a></li>
                    <li><a class="dropdown-item" href="#">Áo</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Váy</a></li>
                  </ul>
                </li>

              </ul>
              <form class="d-flex" method="get" role="timkiem" action="{{route('timkiem')}}">
                <input class="form-control me-3" type="search" name="timkiem" placeholder="Tìm Kiếm Sản Phẩm"
                  aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Tìm</button>
              </form>
              <!--Cart -->
              <div class="row inner-header">
                <div class="col-lg-12 text-right col-md-12">
                  <ul class="nav-right">
                    <li class="heart-icon"><a href="#">
                        <i class="icon_heart_alt"></i>

                        <span>1</span>
                      </a>
                    </li>
                    <li class="cart-icon"><a href="{{url('listcart')}}">
                        <i class="icon_bag_alt"></i>
                        @if(Session::has("cart") != null)
                        <span id="total-quanty-show">{{Session::get("cart")->totalQty}}</span>
                        @else
                        <span id="total-quanty-show">0</span>
                        @endif

                      </a>
                      <div class="cart-hover">
                        <div id="change-item-cart">
                          @if(Session::has("cart") != null)
                          <div class="select-items">
                            <table>
                              <tbody>
                                @foreach(Session::get("cart")->items as $cart )
                                <tr>
                                  <td class="si-pic"><img src="Uploads/{{$cart['ten_san_pham']->image}}" width="70px"
                                      height="70px" alt=""></td>
                                  <td class="si-text">
                                    <div class="product-selected">
                                      <p>{{number_format($cart['ten_san_pham']->Giasp)}}₫ x{{$cart['qty']}} </p>
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
                          </div>
                        </div>


                        <div class="select-button">
                          <a href="{{url('listcart')}}" class="primary-btn view-card">VIEW CARD</a>
                          <a href="{{url('checkout')}}" class="primary-btn checkout-btn">CHECK OUT</a>
                        </div>
                        @else
                        <h4>Giỏ của bạn đang trống</h4>
                      </div>
                      @endif
                </div>
                </li>
                </ul>
              </div>
            </div>
            <!--/Cart -->
          </div>
      </div>
      </nav>
    </div>
  </div>




         <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped table-sm3">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Ngày mua</th>
                            <th>Số lượng</th>
                            <th>Tiền thanh toán</th>
                            <th>Hình thức Thanh toán</th>
                            <th>Ghi chú</th>

                        </tr>
                    </thead>
                    <tbody>
                      @foreach($bills as $bi)
                      <tr>
                       <td>{{$loop->index + 1}}</td>
                       <td>{{$bi->usename_buy_product}}</td>
                       <td>{{$bi->date_order}}</td>
                       <td>{{$bi->product_qty}}</td>
                       <td>{{$bi->product_totalprice}}</td>
                       <td>{{$bi->payment}}</td>
                       <td>{{$bi->note}}</td>
                      </tr>
                      @endforeach

                     </tbody>
                 </table>   
                     {{$bills->links()}}

              </div>
         </div> 

  <!--footer -->
  <div class="container-fluid">
    <footer class="py-5">
      <div class="row">
        <div class="col-2">
          <img src="{{asset('img/logo.svg')}}" width="180px">
          <ul class="nav flex-column">
            <br>
            <li class="nav-item mb-2"> <i class="fa-solid fa-phone"></i><a href="#"
                class="nav-link p-0 text-muted">1900565657</a></li>
            <br>
            <li class="nav-item mb-2"><i class="fa-solid fa-envelope"></i><a href=""
                class="nav-link p-0 text-muted">info@postmart.vn</a></li>
            <br>
            <li class="nav-item mb-2"><i class="fa-solid fa-house-chimney"></i><a href=""
                class="nav-link p-0 text-muted">Số 5, Phạm Hùng, Mỹ Đình 2, Nam Từ Liêm, Hà Nội</a></li>

          </ul>
        </div>

        <div class="col-2">
          <h5>Hỗ Trợ</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Quy trình mua bán</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Chính sách đổi trả</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Quy trình giải quyết khiếu nại</a>
            </li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Quy định hàng hóa cấm </a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Chính sách vận chuyển</a></li>
          </ul>
        </div>

        <div class="col-2">
          <h5>Đối tác</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Thông tin OCOP Quốc Gia</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Giới thiệu về Postmart</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Điều khoản chung</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Quy chế hoạt động</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Cách thức đăng ký VietnamPostpay</a>
            </li>
          </ul>
        </div>

        <div class="col-4 offset-1">
          <form>
            <h5>Đăng ký thông tin khuyến mại</h5>

            <div class="d-flex w-100 gap-2">
              <label for="newsletter1" class="visually-hidden">Email address</label>
              <input id="newsletter1" type="text" class="form-control" placeholder="Nhập địa chỉ email của bạn">
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
  <!--/footer -->
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

  <script type="text/javascript">
    function addcart(id) {
      $.ajax({
        type: "GET",
        url: 'addtocart/' + id,

      }).done(function (response) {
        rendercart(response);
        $("#change-item-cart").empty();
        $("#change-item-cart").html(response);
        alertify.success('Đã thêm vào giỏ hàng');
      });

    }
    $("#change-item-cart").on("click", ".si-close i", function () {
      $.ajax({
        type: "GET",
        url: 'deleteCart/' + $(this).data("id"),

      }).done(function (response) {
        rendercart(response);
        $("#change-item-cart").empty();
        $("#change-item-cart").html(response);
        alertify.success('Đã xóa sản phẩm');
      });
    });
    function rendercart(response) {
      $("#change-item-cart").empty();
      $("#change-item-cart").html(response);
      $("#total-quanty-show").text($("#total-quanty-cart").val());

    }

  </script>

  </div>
</body>

</html>