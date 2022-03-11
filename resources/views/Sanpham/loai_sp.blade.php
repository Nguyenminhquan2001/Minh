<!DOCTYPE html>
<html >

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Trang Chủ</title>
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" title="style" href="../css/sale.css">
  <link rel="stylesheet" href="../asset/css/themify-icons.css" type="text/css">
  <link rel="stylesheet" href="../asset/css/elegant-icons.css" type="text/css">
  <link rel="stylesheet" href="../asset/css/style.css" type="text/css">
  <link rel="stylesheet" href="../fontawesome-free-6.0.0/css/all.min.css">
  <!-- Styles -->
   
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/bootstrap.js"></script>
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
           
          <button><a href="{{ url('/dashboard') }}"
              class="list-inline top-nav-right-list underline">Dashboard</a></button>
            
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
                    @foreach($Danhmuc as $dm)
                    <li><a class="dropdown-item" href="{{route('loai_sp',$dm->Ten)}}">{{$dm->Ten}}</a></li>
                   @endforeach
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
                                  <td class="si-pic"><img src="../Uploads/{{$cart['ten_san_pham']->image}}" width="70px"
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




  <div class="row">
    <div class="col-md-12">
      <center>
        <h1>Sản Phẩm Mới</h1>
      </center>
      <p class="pull-left"></p>
    </div>
  </div>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="row">
            @foreach($loai_sp as $sp)
            <div class="col-md-3">
              <div class="single-item">
                @if($sp->GiaKM !=0)
                <div class="ribbon-wrapper">
                  <div class="ribbon sale">Sale</div>
                </div>
                @endif
                <div class="card" style="width: 18rem;">
                  <a href="{{route('chitietsp',$sp->id)}}"><img src="../Uploads/{{$sp->image}}" height="400px"
                      class="card-img-top" alt="..."></a>

                  <div class="card-body">
                    <center>
                      <h5 class="card-title">{{$sp->Tensanpham}}</h5>
                    </center>
                    @if($sp->GiaKM==0)
                    <center>
                      <p class="card-text" style="color: red; ">{{number_format($sp->Giasp)}} vnđ</p>
                    </center>
                    @else
                    <p class="card-text" style="text-decoration: line-through; float: left;">
                      {{number_format($sp->Giasp)}} vnđ</p>
                    <p class="card-text" style="color: red; float: right;">{{number_format($sp->GiaKM)}} vnđ</p>
                    @endif


                    <center><button type="button" class="addcart"><a onclick="addcart({{$sp->id}})"
                          href="javascript:">Add to Cart</a></button></center>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            <div>
              
            </div>
          </div>
        </div>
      </div>
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
        url: '/addtocart/' + id,

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
        url: '/deleteCart/' + $(this).data("id"),

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