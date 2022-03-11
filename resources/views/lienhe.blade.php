  <!DOCTYPE html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Liên Hệ</title>
     <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" title="style" href="css/sale.css">
  <link rel="stylesheet" title="style" href="asset/css/style2.css">
  <link rel="stylesheet" href="asset/css/themify-icons.css" type="text/css">
  <link rel="stylesheet" href="asset/css/elegant-icons.css" type="text/css">
  <link rel="stylesheet" href="asset/css/style.css" type="text/css">
  <link rel="stylesheet" href="fontawesome-free-6.0.0/css/all.min.css">
  <!-- Styles -->
    <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  </head>
  <body class="antialiased ">
    <div class="container-fluid" style="background-color:#F5F5F5;">
      <div class="row">
        <div class="col-md-10 quan">
         <a href="{{route('welcome')}}"><img src="{{asset('img/logo.svg')}}  " alt="logo" ></a>
       </div> 
       <div class="col-md-2">
        @if (Route::has('login'))
        <div  class=" hidden fixeds  top-0 right-0 px-6 py-4 sm:block ">
          @auth
          <button><a href="{{ url('/dashboard') }}" class="list-inline top-nav-right-list underline">Dashboard</a></button> 

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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                            <td class="si-pic"><img src="Uploads/{{$cart['ten_san_pham']->image}}" width="70px" height="70px" alt=""></td>
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
                  @endif
                  
                  <div class="select-button">
                    <a href="{{url('listcart')}}" class="primary-btn view-card">VIEW CARD</a>
                    <a href="{{url('checkout')}}" class="primary-btn checkout-btn">CHECK OUT</a>
                  </div>

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
    <!-- lienhe-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="" ><center><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3678.0141923553406!2d89.551518!3d22.801938!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff8ff8ef7ea2b7%3A0x1f1e9fc1cf4bd626!2sPranon+Pvt.+Limited!5e0!3m2!1sen!2s!4v1407828576904" width="1170px"height="500px"></iframe></center></div></div>
        </div>
        <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <div class="container">
              <div id="content" class="space-top-none">

                <div class="space50">&nbsp;</div>
                <div class="row">
                  <div class="col-sm-8">
                    <h2>Liên Hệ</h2>
                    <div class="space20">&nbsp;</div>
                    <p>Có vấn đề thắc mắc xin liên hệ với chúng tôi<br>
                      Hãy để lại lời nhắn 
                    </p>
                    <div class="space20">&nbsp;</div>
                    <form action="#" method="post" class="contact-form">  
                      <div class="form-block">
                        Tên của bạn:<br>
                        <input name="your-name" type="text" placeholder="Your Name (required)">
                      </div>

                      <div class="form-block">
                        Email:<br>
                        <input name="your-email" type="email" placeholder="Your Email (required)">
                      </div>
                      <div class="form-block">
                        Chủ đề:<br>
                        <input name="your-subject" type="text" placeholder="Subject">
                      </div>
                      <div class="form-block">
                        Nội dung:<br>
                        <textarea name="your-message" placeholder="Your Message"></textarea>
                      </div>
                      <div class="form-block">
                        <button type="submit" class="beta-btn primary">Gửi<i class="fa fa-chevron-right"></i></button>
                      </div>
                    </form>
                  </div>
                  <div class="col-sm-4">
                    <h2>Thông tin liên hệ</h2>
                    <div class="space20">&nbsp;</div>

                    <h6 class="contact-title">Địa chỉ</h6>
                    <p>
                     Số 5, Phạm Hùng, Mỹ Đình 2,<br>
                     Nam Từ Liêm, Hà Nội, <br>
                     Việt Nam
                   </p>
                   <div class="space20">&nbsp;</div>
                   <h6 class="contact-title">Hợp tác</h6>
                   <p>
                    Số 5, Phạm Hùng, Mỹ Đình 2, <br>
                    Nam Từ Liêm, Hà Nội. <br>
                    <a href="mailto:info@postmart.vn">info@postmart.vn</a>
                  </p>
                  <div class="space20">&nbsp;</div>
                  <h6 class="contact-title">Tuyển Nhân Sự</h6>
                  <p>
                    Chúng tôi luôn tìm kiếm những người tài năng để <br>
                    gia nhập đội ngũ của chúng tôi. <br>
                    <a href="mailto:info@postmart.vn">info@postmart.vn</a>
                  </p>
                </div>
              </div>
            </div> <!-- #content -->
          </div> <!-- .container -->
        </div>
      </div>
    </div> 
  </div>
</div>  
</div>
<div class="container">
  <footer class="py-5">
    <div class="row">
      <div class="col-2">
        <img src="{{asset('img/logo.svg')}}">
        <br>
        <ul class="nav flex-column">
          <br>
          <li> <i class="fa-solid fa-phone"></i>
           <span><a href="tel:1900565657">1900565657</a></span>
         </li>
         <br>
         <li>
          <i class="fa-solid fa-envelope"></i>
          <span>info@postmart.vn</span>
        </li><br>
        <li>
          <i class="fa-solid fa-house-chimney"></i>
          <span>Số 5, Phạm Hùng, Mỹ Đình 2, Nam Từ Liêm, Hà Nội</span>
        </li>
      </ul>
      </div>

      <div class="col-2">
        <h5>Hỗ Trợ</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Quy trình mua bán</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Chính sách đổi trả</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Quy trình giải quyết khiếu nại</a></li>
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
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Cách thức đăng ký VietnamPostpay</a></li>
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
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
      </ul>
    </div>
  </footer>
</div>
</body>
</html>
