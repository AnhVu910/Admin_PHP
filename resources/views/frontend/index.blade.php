<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Mộc store - @yield('title')</title>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('../css/open-iconic-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('../css/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('../css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('../css/owl.theme.default.min.css')}}" />
    <link rel="stylesheet" href="{{asset('../css/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{asset('../css/aos.css')}}" />
    <link rel="stylesheet" href="{{asset('../css/ionicons.min.css')}}" />
    <link rel="stylesheet" href="{{asset('../css/bootstrap-datepicker.css')}}" />
    <link rel="stylesheet" href="{{asset('../css/flaticon.css')}}" />
    <link rel="stylesheet" href="{{asset('../css/icomoon.css')}}" />
    <link rel="stylesheet" href="{{asset('../css/style.css')}}" />

    <link rel="stylesheet" href="{{asset('../css/toastr.min.css')}}">
    
    {{-- <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css" />
    <link rel="stylesheet" href="css/animate.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="css/magnific-popup.css" />
    <link rel="stylesheet" href="css/aos.css" />
    <link rel="stylesheet" href="css/ionicons.min.css" />
    <link rel="stylesheet" href="css/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="css/jquery.timepicker.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/icomoon.css" />
    <link rel="stylesheet" href="css/style.css" /> --}}
    @yield('css')
  </head>
  <body class="goto-here">
    <div class="py-1 bg-primary">
        <div class="container">
          <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
              <div class="row d-flex">
                <div class="col-md pr-4 d-flex topper align-items-center">
                  <div
                    class="icon mr-2 d-flex justify-content-center align-items-center"
                  >
                    <span class="icon-phone2"></span>
                  </div>
                  <span class="text">{{isset($info->phone) ? $info->phone : ""}}</span>
                </div>
                <div class="col-md pr-4 d-flex topper align-items-center">
                  <div
                    class="icon mr-2 d-flex justify-content-center align-items-center"
                  >
                    <span class="icon-paper-plane"></span>
                  </div>
                  <span class="text">{{isset($info->email) ? $info->email : ""}}</span>
                </div>
                <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                  <span class="text">Giao hàng nhanh chóng &amp; Miễn phí vận chuyển</span>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <nav
        class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light"
        id="ftco-navbar"
      >
        <div class="container">
          <a class="navbar-brand" href="{{route('user.home')}}">MOC Store</a>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#ftco-nav"
            aria-controls="ftco-nav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="oi oi-menu"></span> Menu
          </button>
          <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a href="{{route('user.home')}}" class="nav-link">Trang chủ</a>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="dropdown04"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  >Cửa hàng</a
                >
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="{{route('user.product')}}">Sản phẩm</a>
                  {{-- <a class="dropdown-item" href="product-single.html">Single Product</a> --}}
                  <a class="dropdown-item" href="{{route('user.cart')}}">Giỏ hàng</a>
                  {{-- @if(isset(Auth::user()->id))
                  <a class="dropdown-item" href="{{route('user.info')}}">Thông tin cá nhân</a>
                  <a class="dropdown-item" href="{{route('user.info')}}">Xin chào {{Auth::user()->name}}</a>
                  @else
                  
                  @endif --}}
                </div>
              </li>
              <li class="nav-item">
                <a href="{{route('user.about')}}" class="nav-link">Về chúng tôi</a>
              </li>
              {{-- <li class="nav-item">
                <a href="blog.html" class="nav-link">Blog</a>
              </li> --}}
              <li class="nav-item">
                <a href="{{route('user.contact')}}" class="nav-link">Liên hệ</a>
              </li>
              @if(isset(Auth::user()->id))
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"
                  href="#"
                  id="dropdown04"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false">
                  Xin chào : <span style="color:#82AE46;">{{Auth::user()->name}}</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="{{route('user.info')}}">Thông tin cá nhân</a>
                  <a class="dropdown-item" href="{{route('user.info')}}">Đổi mật khẩu</a>
                  {{-- <a class="dropdown-item" href="{{route('logout')}}">Đăng xuất</a> --}}
                  <a href="{{route('logout')}}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Đăng xuất <i class="fa fa-sign-out" aria-hidden="true"></i></a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>
              </li>
              @else
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"
                  href="#"
                  id="dropdown04"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false">
                  Tài khoản
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="{{route('login')}}">Đăng nhập</a>
                  <a class="dropdown-item" href="{{route('register')}}">Đăng ký</a>
                </div>
              </li>
              @endif
              <li class="nav-item cta cta-colored">
                <a href="{{route('user.cart')}}" class="nav-link">
                  <span class="icon-shopping_cart"></span>[<span id="quantity-product">{{isset($cart) ? $cart : 0}}</span>]
                </a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <!-- END nav -->
    @yield('body')
    <footer class="ftco-footer ftco-section">
        <div class="container">
          <div class="row">
            <div class="mouse">
              <a href="#" class="mouse-icon">
                <div class="mouse-wheel">
                  <span class="ion-ios-arrow-up"></span>
                </div>
              </a>
            </div>
          </div>
          <div class="row mb-5">
            <div class="col-md">
              <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">MỘC Store</h2>
                <p>
                  Sản phẩm chất lượng cùng với chính sách vận chuyển linh hoạt. 
                  Đảm bảo sự hài lòng tới khách hàng.
                </p>
                <ul
                  class="ftco-footer-social list-unstyled float-md-left float-lft mt-5"
                >
                  <li class="ftco-animate">
                    <a href="#"><span class="icon-twitter"></span></a>
                  </li>
                  <li class="ftco-animate">
                    <a href="#"><span class="icon-facebook"></span></a>
                  </li>
                  <li class="ftco-animate">
                    <a href="#"><span class="icon-instagram"></span></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md">
              <div class="ftco-footer-widget mb-4 ml-md-5">
                <h2 class="ftco-heading-2">Danh mục</h2>
                <ul class="list-unstyled">
                  <li><a href="#" class="py-2 d-block">Trang chủ</a></li>
                  <li><a href="#" class="py-2 d-block">Sản phẩm</a></li>
                  <li><a href="#" class="py-2 d-block">Về chúng tôi</a></li>
                  <li><a href="#" class="py-2 d-block">Liên hệ</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-4">
              <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">Hỗ trợ</h2>
                <div class="d-flex">
                  <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                    <li>
                      <a href="#" class="py-2 d-block">Chính sách vận chuyển</a>
                    </li>
                    <li>
                      <a href="#" class="py-2 d-block">Chính sách thanh toán</a>
                    </li>
                    <li>
                      <a href="#" class="py-2 d-block">Chính sách đổi trả</a>
                    </li>
                    <li><a href="#" class="py-2 d-block">Chính sách khác</a></li>
                  </ul>
                  {{-- <ul class="list-unstyled">
                    <li><a href="#" class="py-2 d-block">FAQs</a></li>
                    <li><a href="#" class="py-2 d-block">Contact</a></li>
                  </ul> --}}
                </div>
              </div>
            </div>
            <div class="col-md">
              <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">Nếu bạn có thắc mắc?</h2>
                <div class="block-23 mb-3">
                  <ul>
                    <li>
                      <span class="icon icon-map-marker"></span>
                      <span class="text">
                        {{isset($info->address) ? $info->address : ""}}
                      </span>
                    </li>
                    <li>
                      <a href="#"
                        ><span class="icon icon-phone"></span
                        ><span class="text">{{isset($info->phone) ? $info->phone : ""}}</span></a
                      >
                    </li>
                    <li>
                      <a href="#"
                        ><span class="icon icon-envelope"></span
                        ><span class="text">{{isset($info->email) ? $info->email : ""}}</span></a
                      >
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          {{-- <div class="row">
            <div class="col-md-12 text-center">
              <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>
                  document.write(new Date().getFullYear());
                </script>
                All rights reserved | This template is made with
                <i class="icon-heart color-danger" aria-hidden="true"></i> by
                <a href="#">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
            </div>
          </div> --}}
        </div>
    </footer>
      <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
          <circle
            class="path-bg"
            cx="24"
            cy="24"
            r="22"
            fill="none"
            stroke-width="4"
            stroke="#eeeeee"
          />
          <circle
            class="path"
            cx="24"
            cy="24"
            r="22"
            fill="none"
            stroke-width="4"
            stroke-miterlimit="10"
            stroke="#F96D00"
          />
        </svg>
    </div>
    <script src="{{asset('../js/jquery.min.js')}}"></script>
    <script src="{{asset('../js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{asset('../js/popper.min.js')}}"></script>
    <script src="{{asset('../js/bootstrap.min.js')}}"></script>
    <script src="{{asset('../js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('../js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('../js/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('../js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('../js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('../js/aos.js')}}"></script>
    <script src="{{asset('../js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{asset('../js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('../js/scrollax.min.js')}}"></script>
    <script src="{{asset('../js/google-map.js')}}"></script>
    <script src="{{asset('../js/main.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>

    <script src="{{asset('../js/toastr.min.js')}}"></script>

    {{-- <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script> --}}
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script
      async
      src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"
    ></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() {
        dataLayer.push(arguments);
      }
      gtag("js", new Date());
      gtag("config", "UA-23581568-13");
    </script>
    @yield('script')
  </body>
</html>