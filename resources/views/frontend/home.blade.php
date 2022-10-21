@extends('frontend.index')
@section('title')
    Trang chủ
@endsection
@section('body')
<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
      <div class="slider-item" style="background-image: url(images/bg_4.jpg)">
        <div class="overlay"></div>
        <div class="container">
          <div
            class="row slider-text justify-content-center align-items-center"
            data-scrollax-parent="true"
          >
            <div class="col-md-12 ftco-animate text-center">
              <h1 class="mb-2">Quà tặng sinh nhật &amp; sự kiện</h1>
              <h2 class="subheading mb-4">
                {{-- We deliver organic vegetables &amp; fruits --}}
              </h2>
              <p><a href="#" class="btn btn-primary">Xem thêm</a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="slider-item" style="background-image: url(images/bg_2.jpg)">
        <div class="overlay"></div>
        <div class="container">
          <div
            class="row slider-text justify-content-center align-items-center"
            data-scrollax-parent="true"
          >
            <div class="col-sm-12 ftco-animate text-center">
              <h1 class="mb-2">100% Thủ công</h1>
              <h2 class="subheading mb-4">
                Chúng tôi mang đến cho bạn các sản phẩm chất lượng nhẩt
              </h2>
              <p><a href="#" class="btn btn-primary">Xem thêm</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<section class="ftco-section bg-light">
  <div class="container">
    <div class="row no-gutters ftco-services">
      <div
        class="col-lg-3 text-center d-flex align-self-stretch ftco-animate"
      >
        <div class="media block-6 services mb-md-0 mb-4">
          <div
            class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2"
          >
            <span class="flaticon-shipped"></span>
          </div>
          <div class="media-body">
            <h3 class="heading">Miễn phí vận chuyển</h3>
            <span>lên đến 100.000đ</span>
          </div>
        </div>
      </div>
      <div
        class="col-lg-3 text-center d-flex align-self-stretch ftco-animate"
      >
        <div class="media block-6 services mb-md-0 mb-4">
          <div
            class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2"
          >
            <span class="flaticon-diet"></span>
          </div>
          <div class="media-body">
            <h3 class="heading">Đa dạng</h3>
            <span>Sản phẩm đa dạng, phong phú</span>
          </div>
        </div>
      </div>
      <div
        class="col-lg-3 text-center d-flex align-self-stretch ftco-animate"
      >
        <div class="media block-6 services mb-md-0 mb-4">
          <div
            class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2"
          >
            <span class="flaticon-award"></span>
          </div>
          <div class="media-body">
            <h3 class="heading">Chất lượng</h3>
            <span>Sản phẩm chất lượng cao</span>
          </div>
        </div>
      </div>
      <div
        class="col-lg-3 text-center d-flex align-self-stretch ftco-animate"
      >
        <div class="media block-6 services mb-md-0 mb-4">
          <div
            class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2"
          >
            <span class="flaticon-customer-service"></span>
          </div>
          <div class="media-body">
            <h3 class="heading">Hỗ trợ 24/7</h3>
            <span>Luôn luôn hỗ trợ 24/7</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="ftco-section ftco-category ftco-no-pt">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-6 order-md-last align-items-stretch d-flex">
              <div
                class="category-wrap-2 ftco-animate img align-self-stretch d-flex"
                style="background-image: url(images/bg_5.jpg)"
              >
                <div class="text text-center">
                  <h2 style="background-color: gray; padding-bottom : 5px; color : white;">Danh mục sản phẩm</h2>
                  {{-- <p>Danh mục các sản phẩm</p> --}}
                  <p><a href="#" class="btn btn-primary">Xem thêm</a></p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              @if(isset($categories) && count($categories) > 1)
              @for($i1 = 0; $i1 < count($categories)/2; $i1++)
              <div class="category-wrap ftco-animate img d-flex align-items-end"
                style="background-image: url({{ asset(\Storage::url($categories[$i1]->image_url)) }})">
                <div class="text px-3 py-1">
                  <h2 class="mb-0"><a href="#">{{$categories[$i1]->name}}</a></h2>
                </div>
              </div>
              @endfor
              @endif
            </div>
          </div>
        </div>
        <div class="col-md-4">
          @if(isset($categories) && count($categories) > 1)
          @for($i2 = count($categories)/2; $i2 < count($categories); $i2++)
          <div class="category-wrap ftco-animate img d-flex align-items-end"
            style="background-image: url({{ asset(\Storage::url($categories[$i2]->image_url)) }})">
            <div class="text px-3 py-1">
              <h2 class="mb-0"><a href="#">{{$categories[$i2]->name}}</a></h2>
            </div>
          </div>
          @endfor
          @endif
        </div>
      </div>
    </div>
</section>
<section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center mb-3 pb-3">
        <div class="col-md-12 heading-section text-center ftco-animate">
          <span class="subheading">Các sản phẩm mới tại cửa hàng</span>
          <h2 class="mb-4">SẢN PHẨM MỚI</h2>
          <p>
            Luôn luôn cập nhật những sản phẩm mới để đáp ứng nhu cầu của khách hàng
          </p>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <script data-pagespeed-no-defer>
          //<![CDATA[
          (function () {
            for (
              var g =
                  "function" == typeof Object.defineProperties
                    ? Object.defineProperty
                    : function (b, c, a) {
                        if (a.get || a.set)
                          throw new TypeError(
                            "ES3 does not support getters and setters."
                          );
                        b != Array.prototype &&
                          b != Object.prototype &&
                          (b[c] = a.value);
                      },
                h =
                  "undefined" != typeof window && window === this
                    ? this
                    : "undefined" != typeof global && null != global
                    ? global
                    : this,
                k = ["String", "prototype", "repeat"],
                l = 0;
              l < k.length - 1;
              l++
            ) {
              var m = k[l];
              m in h || (h[m] = {});
              h = h[m];
            }
            var n = k[k.length - 1],
              p = h[n],
              q = p
                ? p
                : function (b) {
                    var c;
                    if (null == this)
                      throw new TypeError(
                        "The 'this' value for String.prototype.repeat must not be null or undefined"
                      );
                    c = this + "";
                    if (0 > b || 1342177279 < b)
                      throw new RangeError("Invalid count value");
                    b |= 0;
                    for (var a = ""; b; )
                      if ((b & 1 && (a += c), (b >>>= 1))) c += c;
                    return a;
                  };
            q != p &&
              null != q &&
              g(h, n, { configurable: !0, writable: !0, value: q });
            var t = this;
            function u(b, c) {
              var a = b.split("."),
                d = t;
              a[0] in d || !d.execScript || d.execScript("var " + a[0]);
              for (var e; a.length && (e = a.shift()); )
                a.length || void 0 === c
                  ? d[e]
                    ? (d = d[e])
                    : (d = d[e] = {})
                  : (d[e] = c);
            }
            function v(b) {
              var c = b.length;
              if (0 < c) {
                for (var a = Array(c), d = 0; d < c; d++) a[d] = b[d];
                return a;
              }
              return [];
            }
            function w(b) {
              var c = window;
              if (c.addEventListener) c.addEventListener("load", b, !1);
              else if (c.attachEvent) c.attachEvent("onload", b);
              else {
                var a = c.onload;
                c.onload = function () {
                  b.call(this);
                  a && a.call(this);
                };
              }
            }
            var x;
            function y(b, c, a, d, e) {
              this.h = b;
              this.j = c;
              this.l = a;
              this.f = e;
              this.g = {
                height:
                  window.innerHeight ||
                  document.documentElement.clientHeight ||
                  document.body.clientHeight,
                width:
                  window.innerWidth ||
                  document.documentElement.clientWidth ||
                  document.body.clientWidth,
              };
              this.i = d;
              this.b = {};
              this.a = [];
              this.c = {};
            }
            function z(b, c) {
              var a,
                d,
                e = c.getAttribute("data-pagespeed-url-hash");
              if ((a = e && !(e in b.c)))
                if (0 >= c.offsetWidth && 0 >= c.offsetHeight) a = !1;
                else {
                  d = c.getBoundingClientRect();
                  var f = document.body;
                  a =
                    d.top +
                    ("pageYOffset" in window
                      ? window.pageYOffset
                      : (document.documentElement || f.parentNode || f)
                          .scrollTop);
                  d =
                    d.left +
                    ("pageXOffset" in window
                      ? window.pageXOffset
                      : (document.documentElement || f.parentNode || f)
                          .scrollLeft);
                  f = a.toString() + "," + d;
                  b.b.hasOwnProperty(f)
                    ? (a = !1)
                    : ((b.b[f] = !0),
                      (a = a <= b.g.height && d <= b.g.width));
                }
              a && (b.a.push(e), (b.c[e] = !0));
            }
            y.prototype.checkImageForCriticality = function (b) {
              b.getBoundingClientRect && z(this, b);
            };
            u(
              "pagespeed.CriticalImages.checkImageForCriticality",
              function (b) {
                x.checkImageForCriticality(b);
              }
            );
            u(
              "pagespeed.CriticalImages.checkCriticalImages",
              function () {
                A(x);
              }
            );
            function A(b) {
              b.b = {};
              for (
                var c = ["IMG", "INPUT"], a = [], d = 0;
                d < c.length;
                ++d
              )
                a = a.concat(v(document.getElementsByTagName(c[d])));
              if (a.length && a[0].getBoundingClientRect) {
                for (d = 0; (c = a[d]); ++d) z(b, c);
                a = "oh=" + b.l;
                b.f && (a += "&n=" + b.f);
                if ((c = !!b.a.length))
                  for (
                    a += "&ci=" + encodeURIComponent(b.a[0]), d = 1;
                    d < b.a.length;
                    ++d
                  ) {
                    var e = "," + encodeURIComponent(b.a[d]);
                    131072 >= a.length + e.length && (a += e);
                  }
                b.i &&
                  ((e =
                    "&rd=" + encodeURIComponent(JSON.stringify(B()))),
                  131072 >= a.length + e.length && (a += e),
                  (c = !0));
                C = a;
                if (c) {
                  d = b.h;
                  b = b.j;
                  var f;
                  if (window.XMLHttpRequest) f = new XMLHttpRequest();
                  else if (window.ActiveXObject)
                    try {
                      f = new ActiveXObject("Msxml2.XMLHTTP");
                    } catch (r) {
                      try {
                        f = new ActiveXObject("Microsoft.XMLHTTP");
                      } catch (D) {}
                    }
                  f &&
                    (f.open(
                      "POST",
                      d +
                        (-1 == d.indexOf("?") ? "?" : "&") +
                        "url=" +
                        encodeURIComponent(b)
                    ),
                    f.setRequestHeader(
                      "Content-Type",
                      "application/x-www-form-urlencoded"
                    ),
                    f.send(a));
                }
              }
            }
            function B() {
              var b = {},
                c;
              c = document.getElementsByTagName("IMG");
              if (!c.length) return {};
              var a = c[0];
              if (!("naturalWidth" in a && "naturalHeight" in a))
                return {};
              for (var d = 0; (a = c[d]); ++d) {
                var e = a.getAttribute("data-pagespeed-url-hash");
                e &&
                  ((!(e in b) &&
                    0 < a.width &&
                    0 < a.height &&
                    0 < a.naturalWidth &&
                    0 < a.naturalHeight) ||
                    (e in b &&
                      a.width >= b[e].o &&
                      a.height >= b[e].m)) &&
                  (b[e] = {
                    rw: a.width,
                    rh: a.height,
                    ow: a.naturalWidth,
                    oh: a.naturalHeight,
                  });
              }
              return b;
            }
            var C = "";
            u("pagespeed.CriticalImages.getBeaconData", function () {
              return C;
            });
            u("pagespeed.CriticalImages.Run", function (
              b,
              c,
              a,
              d,
              e,
              f
            ) {
              var r = new y(b, c, a, e, f);
              x = r;
              d &&
                w(function () {
                  window.setTimeout(function () {
                    A(r);
                  }, 0);
                });
            });
          })();
          pagespeed.CriticalImages.Run(
            "/mod_pagespeed_beacon",
            "https://preview.colorlib.com/theme/vegefoods/index.html",
            "oJcOUTg7z9",
            true,
            false,
            "FBWh-KnCJ9s"
          );
          //]]>
        </script>
        @if(isset($news) && count($news) > 0)
        @foreach($news as $item)
        <div class="col-md-6 col-lg-3 ftco-animate">
          <div class="product">
            <a href="{{asset('')}}product/product-detail/{{$item->id}}" class="img-prod">
              <img
                class="img-fluid"
                src="{{ asset(\Storage::url($item->product_img)) }}"
                {{-- src="images/product-1.jpg" --}}
                alt=""
                data-pagespeed-url-hash="618172125"
                onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
              />
              {{-- <span class="status">30%</span> --}}
              <div class="overlay"></div>
            </a>
            <div class="text py-3 pb-4 px-3 text-center">
              <h3><a href="#">{{$item->name}}</a></h3>
              <div class="d-flex">
                <div class="pricing">
                  <p class="price">
                    {{-- <span class="mr-2 price-dc">$120.00</span> --}}
                    <span class="price-sale">{{$item->price}} VNĐ</span>
                  </p>
                </div>
              </div>
              <div class="bottom-area d-flex px-3">
                <div class="m-auto d-flex">
                  <a
                    href="#"
                    class="add-to-cart d-flex justify-content-center align-items-center text-center"
                  >
                    <span><i class="ion-ios-menu"></i></span>
                  </a>
                  @if(isset(Auth::user()->id))
                  <button class=" text-white btn buy-now d-flex justify-content-center align-items-center mx-1"
                    product-id="{{$item->id}}" style="background-color:#82AE47">
                    <span><i class="ion-ios-cart"></i></span>
                  </button>
                  @else
                  <a href="{{route('login')}}" class="d-flex justify-content-center align-items-center mx-1">
                    <span><i class="ion-ios-cart"></i></span>
                  </a>
                  @endif
                  <a
                    href="#"
                    class="heart d-flex justify-content-center align-items-center"
                  >
                    <span><i class="ion-ios-heart"></i></span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        @endif
      </div>
    </div>
</section>
{{-- <section
    class="ftco-section img"
    style="background-image: url(images/bg_3.jpg)"
  >
    <div class="container">
      <div class="row justify-content-end">
        <div
          class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate"
        >
          <span class="subheading">Best Price For You</span>
          <h2 class="mb-4">Deal of the day</h2>
          <p>
            Far far away, behind the word mountains, far from the countries
            Vokalia and Consonantia
          </p>
          <h3><a href="#">Spinach</a></h3>
          <span class="price">$10 <a href="#">now $5 only</a></span>
          <div id="timer" class="d-flex mt-5">
            <div class="time" id="days"></div>
            <div class="time pl-3" id="hours"></div>
            <div class="time pl-3" id="minutes"></div>
            <div class="time pl-3" id="seconds"></div>
          </div>
        </div>
      </div>
    </div>
</section> --}}
<section class="ftco-section testimony-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate text-center">
        <span class="subheading">Testimony</span>
        <h2 class="mb-4">Nhận xét từ khách hàng</h2>
        <p>
          Những lời nhận xét giúp bạn có cái nhìn khách quan về sản phẩm, dịch vụ của chúng tôi. Hãy tham quan và chọn những sản phẩm thật đẹp.
        </p>
      </div>
    </div>
    <div class="row ftco-animate">
      <div class="col-md-12">
        <div class="carousel-testimony owl-carousel">
          <div class="item">
            <div class="testimony-wrap p-4 pb-5">
              <div
                class="user-img mb-5"
                style="
                  background-image: url(images/person_1.jpg);
                "
              >
                <span
                  class="quote d-flex align-items-center justify-content-center"
                >
                  <i class="icon-quote-left"></i>
                </span>
              </div>
              <div class="text text-center">
                <p class="mb-5 pl-4 line">
                  Sản phẩm tốt, dịch vụ chu đáo tận tình, chắc chắn sẽ ủng hộ Mộc trong thời gian dài sắp tới.
                  Mong Mộc sẽ update thật nhiều sản phẩm.
                </p>
                <p class="name">Nguyễn Minh Vân</p>
                <span class="position">Marketing Manager</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap p-4 pb-5">
              <div
                class="user-img mb-5"
                style="
                  background-image: url(images/person_2.jpg);
                "
              >
                <span
                  class="quote d-flex align-items-center justify-content-center"
                >
                  <i class="icon-quote-left"></i>
                </span>
              </div>
              <div class="text text-center">
                <p class="mb-5 pl-4 line">
                  Sản phẩm tốt, dịch vụ chu đáo tận tình, chắc chắn sẽ ủng hộ Mộc trong thời gian dài sắp tới.
                  Mong Mộc sẽ update thật nhiều sản phẩm.
                </p>
                <p class="name">Hà Minh Thu</p>
                <span class="position">Interface Designer</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap p-4 pb-5">
              <div
                class="user-img mb-5"
                style="
                  background-image: url(images/person_3.jpg);
                "
              >
                <span
                  class="quote d-flex align-items-center justify-content-center"
                >
                  <i class="icon-quote-left"></i>
                </span>
              </div>
              <div class="text text-center">
                <p class="mb-5 pl-4 line">
                  Sản phẩm tốt, dịch vụ chu đáo tận tình, chắc chắn sẽ ủng hộ Mộc trong thời gian dài sắp tới.
                  Mong Mộc sẽ update thật nhiều sản phẩm.
                </p>
                <p class="name">Kính Vạn Hoa</p>
                <span class="position">UI Designer</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap p-4 pb-5">
              <div
                class="user-img mb-5"
                style="
                  background-image: url(images/person_1.jpg);
                "
              >
                <span
                  class="quote d-flex align-items-center justify-content-center"
                >
                  <i class="icon-quote-left"></i>
                </span>
              </div>
              <div class="text text-center">
                <p class="mb-5 pl-4 line">
                  Sản phẩm tốt, dịch vụ chu đáo tận tình, chắc chắn sẽ ủng hộ Mộc trong thời gian dài sắp tới.
                  Mong Mộc sẽ update thật nhiều sản phẩm.
                </p>
                <p class="name">Vân Anh Nguyễn</p>
                <span class="position">Web Developer</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap p-4 pb-5">
              <div
                class="user-img mb-5"
                style="
                  background-image: url(images/person_1.jpg);
                "
              >
                <span
                  class="quote d-flex align-items-center justify-content-center"
                >
                  <i class="icon-quote-left"></i>
                </span>
              </div>
              <div class="text text-center">
                <p class="mb-5 pl-4 line">
                  Sản phẩm tốt, dịch vụ chu đáo tận tình, chắc chắn sẽ ủng hộ Mộc trong thời gian dài sắp tới.
                  Mong Mộc sẽ update thật nhiều sản phẩm.
                </p>
                <p class="name">Phí Thu Hà</p>
                <span class="position">System Analyst</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
{{-- <hr /> --}}
{{-- <section class="ftco-section ftco-partner">
    <div class="container">
      <div class="row">
        <div class="col-sm ftco-animate">
          <a href="#" class="partner"
            ><img
              src="images/partner-1.png"
              class="img-fluid"
              alt="Colorlib Template"
              data-pagespeed-url-hash="3780995850"
              onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
          /></a>
        </div>
        <div class="col-sm ftco-animate">
          <a href="#" class="partner"
            ><img
              src="images/partner-2.png"
              class="img-fluid"
              alt="Colorlib Template"
              data-pagespeed-url-hash="4075495771"
              onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
          /></a>
        </div>
        <div class="col-sm ftco-animate">
          <a href="#" class="partner"
            ><img
              src="images/partner-3.png"
              class="img-fluid"
              alt="Colorlib Template"
              data-pagespeed-url-hash="75028396"
              onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
          /></a>
        </div>
        <div class="col-sm ftco-animate">
          <a href="#" class="partner"
            ><img
              src="images/partner-4.png"
              class="img-fluid"
              alt="Colorlib Template"
              data-pagespeed-url-hash="369528317"
              onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
          /></a>
        </div>
        <div class="col-sm ftco-animate">
          <a href="#" class="partner"
            ><img
              src="images/partner-5.png"
              class="img-fluid"
              alt="Colorlib Template"
              data-pagespeed-url-hash="664028238"
              onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
          /></a>
        </div>
      </div>
    </div>
</section> --}}
<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
    <div class="container py-4">
      <div class="row d-flex justify-content-center py-5">
        <div class="col-md-6">
          <h2 style="font-size: 22px" class="mb-0">
            Đăng ký để nhận thông tin từ chúng tôi
          </h2>
          <span>Những ưu đãi tuyệt vời sẽ được chúng tôi gửi đến bạn !
          </span
          >
        </div>
        <div class="col-md-6 d-flex align-items-center">
          <form action="#" class="subscribe-form">
            <div class="form-group d-flex">
              <input
                type="text"
                class="form-control"
                placeholder="Nhập email của bạn"
              />
              <input type="submit" value="Đăng ký" class="submit px-3" />
            </div>
          </form>
        </div>
      </div>
    </div>
</section>

@endsection
@section('script')
<script>
  $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

  $(document).on('click', '.buy-now', function() {
      var productID = $(this).attr('product-id');
      var quantity = $('input#quantity').val();
      console.log(productID + quantity);
      $.ajax({
          type: "POST",
          url: "/product/add-into-cart",
          data: {
              'productID' : productID,
              'quantity' : quantity
          },
          success: function (response) {
              if (response.status == true) {
                  toastr.success(response.message);
                  if (response.add == true) {
                      let sum = $('span#quantity-product').text() - (-1)
                      $('span#quantity-product').text(sum)
                  }
              } else {
                  toastr.error(response.message);
              }
          }
      });
  })
</script>
@endsection