@extends('frontend.index')
@section('title')
    Sản phẩm
@endsection
@section('body')
    <div
      class="hero-wrap hero-bread"
      style="
        background-image: url({{asset('../images/bg-shop.jpg')}});
      "
    >
      <div class="container">
        <div
          class="row no-gutters slider-text align-items-center justify-content-center"
        >
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs">
              <span class="mr-2"><a href="index.html">Trang chủ</a></span> /
              <span>Sản phẩm</span>
            </p>
            <h1 class="mb-0 bread" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Danh sách sản phẩm</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-10 mb-5 text-center">
            <div class="form-group">
                <form action="{{asset('')}}product/search" method="post" class="d-flex justify-content-between">
                    @csrf
                    <input type="text" name="search" class="form-control" id=""
                    placeholder="Nhập thông tin tìm kiếm ..." style="width:80%;">
                    <input type="submit" value="Tìm kiếm"
                    style="width:20%; background-color:#82AE46; outline:none; border-radius:0px;" class=" btn text-white">
                </form>
            </div>
            <ul class="product-category">
              {{-- <li><a href="#" class="active">Tất cả</a></li> --}}
                <li><a href="{{route('user.product')}}" class="">Tất cả</a></li>
              @if(isset($categories))
              @foreach($categories as $item)
              <li><a href="{{asset('')}}product/category/{{$item->id}}">{{$item->name}}</a></li>
              @endforeach
              @endif
            </ul>
          </div>
        </div>
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
                  "https://preview.colorlib.com/theme/vegefoods/shop.html",
                  "oJcOUTg7z9",
                  true,
                  false,
                  "z7sjMr-CLNQ"
                );
                //]]>
              </script>
          @if(isset($products) && count($products) >0)
          @foreach($products as $item)
          <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="product">
              <a href="{{asset('')}}product/product-detail/{{$item->id}}" class="img-prod">
                <img
                  class="img-fluid"
                  src="{{ asset(\Storage::url($item->product_img)) }}"
                  alt="Colorlib Template"
                  data-pagespeed-url-hash="618172125"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
                />
                {{-- <span class="status">30%</span> --}}
                <div class="overlay"></div>
              </a>
              <div class="text py-3 pb-4 px-3 text-center">
                <h3><a href="{{asset('')}}product/product-detail/{{$item->id}}">{{ $item->name }}</a></h3>
                <div class="d-flex">
                  <div class="pricing">
                    <p class="price">
                      {{-- <span class="mr-2 price-dc">$120.00</span> --}}
                      <span class="price-sale">{{ $item->price }} VNĐ</span>
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
                    {{-- <a
                      href="#"
                      class="buy-now d-flex justify-content-center align-items-center mx-1"
                    >
                      <span><i class="ion-ios-cart"></i></span>
                    </a> --}}
                    @if(isset(Auth::user()->id))
                    <button class=" btn buy-now text-white d-flex justify-content-center align-items-center mx-1"
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
          {{-- <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="product">
              <a href="#" class="img-prod"
                ><img
                  class="img-fluid"
                  src="images/product-2.jpg"
                  alt="Colorlib Template"
                  data-pagespeed-url-hash="912672046"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
                />
                <div class="overlay"></div>
              </a>
              <div class="text py-3 pb-4 px-3 text-center">
                <h3><a href="#">Strawberry</a></h3>
                <div class="d-flex">
                  <div class="pricing">
                    <p class="price"><span>$120.00</span></p>
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
                    <a
                      href="#"
                      class="buy-now d-flex justify-content-center align-items-center mx-1"
                    >
                      <span><i class="ion-ios-cart"></i></span>
                    </a>
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
          <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="product">
              <a href="#" class="img-prod"
                ><img
                  class="img-fluid"
                  src="images/xproduct-3.jpg.pagespeed.ic.J11-RQjosA.webp"
                  alt="Colorlib Template"
                  data-pagespeed-url-hash="1207171967"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
                />
                <div class="overlay"></div>
              </a>
              <div class="text py-3 pb-4 px-3 text-center">
                <h3><a href="#">Green Beans</a></h3>
                <div class="d-flex">
                  <div class="pricing">
                    <p class="price"><span>$120.00</span></p>
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
                    <a
                      href="#"
                      class="buy-now d-flex justify-content-center align-items-center mx-1"
                    >
                      <span><i class="ion-ios-cart"></i></span>
                    </a>
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
          <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="product">
              <a href="#" class="img-prod"
                ><img
                  class="img-fluid"
                  src="images/xproduct-4.jpg.pagespeed.ic.-zi4uKxOWe.webp"
                  alt="Colorlib Template"
                  data-pagespeed-url-hash="1501671888"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
                />
                <div class="overlay"></div>
              </a>
              <div class="text py-3 pb-4 px-3 text-center">
                <h3><a href="#">Purple Cabbage</a></h3>
                <div class="d-flex">
                  <div class="pricing">
                    <p class="price"><span>$120.00</span></p>
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
                    <a
                      href="#"
                      class="buy-now d-flex justify-content-center align-items-center mx-1"
                    >
                      <span><i class="ion-ios-cart"></i></span>
                    </a>
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
          <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="product">
              <a href="#" class="img-prod"
                ><img
                  class="img-fluid"
                  src="images/xproduct-5.jpg.pagespeed.ic.ZbzeN2jASE.webp"
                  alt="Colorlib Template"
                  data-pagespeed-url-hash="1796171809"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
                />
                <span class="status">30%</span>
                <div class="overlay"></div>
              </a>
              <div class="text py-3 pb-4 px-3 text-center">
                <h3><a href="#">Tomatoe</a></h3>
                <div class="d-flex">
                  <div class="pricing">
                    <p class="price">
                      <span class="mr-2 price-dc">$120.00</span
                      ><span class="price-sale">$80.00</span>
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
                    <a
                      href="#"
                      class="buy-now d-flex justify-content-center align-items-center mx-1"
                    >
                      <span><i class="ion-ios-cart"></i></span>
                    </a>
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
          <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="product">
              <a href="#" class="img-prod"
                ><img
                  class="img-fluid"
                  src="images/xproduct-6.jpg.pagespeed.ic.bV2cvmi8jU.webp"
                  alt="Colorlib Template"
                  data-pagespeed-url-hash="2090671730"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
                />
                <div class="overlay"></div>
              </a>
              <div class="text py-3 pb-4 px-3 text-center">
                <h3><a href="#">Brocolli</a></h3>
                <div class="d-flex">
                  <div class="pricing">
                    <p class="price"><span>$120.00</span></p>
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
                    <a
                      href="#"
                      class="buy-now d-flex justify-content-center align-items-center mx-1"
                    >
                      <span><i class="ion-ios-cart"></i></span>
                    </a>
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
          <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="product">
              <a href="#" class="img-prod"
                ><img
                  class="img-fluid"
                  src="images/xproduct-7.jpg.pagespeed.ic.5cTir-xz-1.webp"
                  alt="Colorlib Template"
                  data-pagespeed-url-hash="2385171651"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
                />
                <div class="overlay"></div>
              </a>
              <div class="text py-3 pb-4 px-3 text-center">
                <h3><a href="#">Carrots</a></h3>
                <div class="d-flex">
                  <div class="pricing">
                    <p class="price"><span>$120.00</span></p>
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
                    <a
                      href="#"
                      class="buy-now d-flex justify-content-center align-items-center mx-1"
                    >
                      <span><i class="ion-ios-cart"></i></span>
                    </a>
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
          <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="product">
              <a href="#" class="img-prod"
                ><img
                  class="img-fluid"
                  src="images/xproduct-8.jpg.pagespeed.ic.eAtHbtNqMI.webp"
                  alt="Colorlib Template"
                  data-pagespeed-url-hash="2679671572"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
                />
                <div class="overlay"></div>
              </a>
              <div class="text py-3 pb-4 px-3 text-center">
                <h3><a href="#">Fruit Juice</a></h3>
                <div class="d-flex">
                  <div class="pricing">
                    <p class="price"><span>$120.00</span></p>
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
                    <a
                      href="#"
                      class="buy-now d-flex justify-content-center align-items-center mx-1"
                    >
                      <span><i class="ion-ios-cart"></i></span>
                    </a>
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
          <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="product">
              <a href="#" class="img-prod"
                ><img
                  class="img-fluid"
                  src="images/xproduct-9.jpg.pagespeed.ic.0wW7PZPOOa.webp"
                  alt="Colorlib Template"
                  data-pagespeed-url-hash="2974171493"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
                />
                <span class="status">30%</span>
                <div class="overlay"></div>
              </a>
              <div class="text py-3 pb-4 px-3 text-center">
                <h3><a href="#">Onion</a></h3>
                <div class="d-flex">
                  <div class="pricing">
                    <p class="price">
                      <span class="mr-2 price-dc">$120.00</span
                      ><span class="price-sale">$80.00</span>
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
                    <a
                      href="#"
                      class="buy-now d-flex justify-content-center align-items-center mx-1"
                    >
                      <span><i class="ion-ios-cart"></i></span>
                    </a>
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
          <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="product">
              <a href="#" class="img-prod"
                ><img
                  class="img-fluid"
                  src="images/xproduct-10.jpg.pagespeed.ic.fyjNxoTvI1.webp"
                  alt="Colorlib Template"
                  data-pagespeed-url-hash="4125149745"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
                />
                <div class="overlay"></div>
              </a>
              <div class="text py-3 pb-4 px-3 text-center">
                <h3><a href="#">Apple</a></h3>
                <div class="d-flex">
                  <div class="pricing">
                    <p class="price"><span>$120.00</span></p>
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
                    <a
                      href="#"
                      class="buy-now d-flex justify-content-center align-items-center mx-1"
                    >
                      <span><i class="ion-ios-cart"></i></span>
                    </a>
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
          <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="product">
              <a href="#" class="img-prod"
                ><img
                  class="img-fluid"
                  src="images/xproduct-11.jpg.pagespeed.ic.Pea1fR8DJK.webp"
                  alt="Colorlib Template"
                  data-pagespeed-url-hash="124682370"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
                />
                <div class="overlay"></div>
              </a>
              <div class="text py-3 pb-4 px-3 text-center">
                <h3><a href="#">Garlic</a></h3>
                <div class="d-flex">
                  <div class="pricing">
                    <p class="price"><span>$120.00</span></p>
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
                    <a
                      href="#"
                      class="buy-now d-flex justify-content-center align-items-center mx-1"
                    >
                      <span><i class="ion-ios-cart"></i></span>
                    </a>
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
          <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="product">
              <a href="#" class="img-prod"
                ><img
                  class="img-fluid"
                  src="images/xproduct-12.jpg.pagespeed.ic.igZcIxvvqp.webp"
                  alt="Colorlib Template"
                  data-pagespeed-url-hash="419182291"
                  onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
                />
                <div class="overlay"></div>
              </a>
              <div class="text py-3 pb-4 px-3 text-center">
                <h3><a href="#">Chilli</a></h3>
                <div class="d-flex">
                  <div class="pricing">
                    <p class="price"><span>$120.00</span></p>
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
                    <a
                      href="#"
                      class="buy-now d-flex justify-content-center align-items-center mx-1"
                    >
                      <span><i class="ion-ios-cart"></i></span>
                    </a>
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
          </div> --}}
        </div>
        <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
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