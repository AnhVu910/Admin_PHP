@extends('frontend.index')
@section('title')
    Chi tiết sản phẩm
    {{-- include tên sản phẩm --}}
@endsection
@section('body')
<div class="hero-wrap hero-bread" style="
  background-image: url({{asset('../images/bg-shop.jpg')}});">
    <div class="container">
        <div
            class="row no-gutters slider-text align-items-center justify-content-center"
        >
            <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs">
                <span class="mr-2"><a href="{{ route('user.home') }}">Trang chủ</a></span> /
                <span class="mr-2"><a href="{{ route('user.product') }}">Sản phẩm</a></span> /
                <span>Chi tiết sản phẩm</span>
            </p>
            <h1 class="mb-0 bread" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Chi tiết sản phẩm</h1>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section">
<div class="container">
  <div class="row">
    <div class="col-lg-6 mb-5 ftco-animate">
      <a href="{{ asset(\Storage::url($product->product_img)) }}" class="image-popup">
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
                  ((e = "&rd=" + encodeURIComponent(JSON.stringify(B()))),
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
            u(
              "pagespeed.CriticalImages.Run",
              function (b, c, a, d, e, f) {
                var r = new y(b, c, a, e, f);
                x = r;
                d &&
                  w(function () {
                    window.setTimeout(function () {
                      A(r);
                    }, 0);
                  });
              }
            );
          })();
          pagespeed.CriticalImages.Run(
            "/mod_pagespeed_beacon",
            "https://preview.colorlib.com/theme/vegefoods/product-single.html",
            "oJcOUTg7z9",
            true,
            false,
            "sEVK6BTeGbA"
          );
          //]]>
        </script>
        <img style="height: auto;"
          src="{{ asset(\Storage::url($product->product_img)) }}"
          class="img-fluid"
          alt="Colorlib Template"
          data-pagespeed-url-hash="618172125"
          onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
      /></a>
    </div>
    <div class="col-lg-6 product-details pl-md-5 ftco-animate">
      <h3>{{ $product->name }}</h3>
      <div class="rating d-flex">
        <p class="text-left mr-4">
          <a href="#" class="mr-2">5.0</a>
          <a href="#"><span class="ion-ios-star-outline"></span></a>
          <a href="#"><span class="ion-ios-star-outline"></span></a>
          <a href="#"><span class="ion-ios-star-outline"></span></a>
          <a href="#"><span class="ion-ios-star-outline"></span></a>
          <a href="#"><span class="ion-ios-star-outline"></span></a>
        </p>
        {{-- <p class="text-left mr-4">
          <a href="#" class="mr-2" style="color: #000"
            >100 <span style="color: #bbb">Rating</span></a
          >
        </p>
        <p class="text-left">
          <a href="#" class="mr-2" style="color: #000"
            >500 <span style="color: #bbb">Sold</span></a
          >
        </p> --}}
      </div>
      <p class="price"><span>{{ $product->price }} VNĐ</span></p>
      <p>
        {{ $product->description }}
      </p>
      <div class="row mt-4">
        {{-- <div class="col-md-6">
          <div class="form-group d-flex">
            <div class="select-wrap">
              <div class="icon">
                <span class="ion-ios-arrow-down"></span>
              </div>
              <select name="" id="" class="form-control">
                <option value="">Small</option>
                <option value="">Medium</option>
                <option value="">Large</option>
                <option value="">Extra Large</option>
              </select>
            </div>
          </div>
        </div> --}}
        <div class="w-100"></div>
        <div class="input-group col-md-6 d-flex mb-3">
          <span class="input-group-btn mr-2">
            <button
              type="button"
              class="quantity-left-minus btn"
              data-type="minus"
              data-field=""
            >
              <i class="ion-ios-remove"></i>
            </button>
          </span>
          <input
            type="text"
            id="quantity"
            name="quantity"
            class="form-control input-number"
            value="1"
            min="1"
            max="100"
          />
          <span class="input-group-btn ml-2">
            <button
              type="button"
              class="quantity-right-plus btn"
              data-type="plus"
              data-field=""
            >
              <i class="ion-ios-add"></i>
            </button>
          </span>
        </div>
        <div class="w-100"></div>
        {{-- <div class="col-md-12">
          <p style="color: #000">600 kg available</p>
        </div> --}}
      </div>
      <p>
        {{-- //todo --}}
        @if(isset(Auth::user()->id))
        <a class="buy-now btn btn-black py-3 px-5 text-white" product-id="{{$product->id}}">Thêm vào giỏ hàng</a>
        @else
        <a href="{{route('login')}}" class="btn btn-black py-3 px-5">Thêm vào giỏ hàng</a>
        @endif
      </p>
    </div>
  </div>
</div>
</section>
<section class="ftco-section">
<div class="container">
  <div class="row justify-content-center mb-3 pb-3">
    <div class="col-md-12 heading-section text-center ftco-animate">
      <span class="subheading">Sản phẩm</span>
      <h2 class="mb-4">Sản phẩm được đề xuất</h2>
      <p>
        Có thể bạn cũng quan tâm các sản phẩm cùng loại với sản phẩm bạn đang xem
      </p>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    @foreach($recommends as $recommend)
    <div class="col-md-6 col-lg-3 ftco-animate">
      <div class="product">
        <a href="{{asset('')}}product/product-detail/{{$recommend->id}}" class="img-prod"
          ><img
            class="img-fluid"
            src="{{ asset(\Storage::url($recommend->product_img)) }}"
            alt="Colorlib Template"
            data-pagespeed-url-hash="618172125"
            onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
          />
          {{-- <span class="status">30%</span> --}}
          <div class="overlay"></div>
        </a>
        <div class="text py-3 pb-4 px-3 text-center">
          <h3><a href="#">{{$recommend->name}}</a></h3>
          <div class="d-flex">
            <div class="pricing">
              <p class="price">
                {{-- <span class="mr-2 price-dc">$120.00</span> --}}
                <span class="price-sale">{{$recommend->price}} VNĐ</span>
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
              <button class=" btn buy-now text-white d-flex justify-content-center align-items-center mx-1"
                product-id="{{$recommend->id}}" style="background-color:#82AE47">
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

  $('button.quantity-left-minus').on('click', function() {
      if($('input#quantity').val() > 0) {
          $('input#quantity').val($('input#quantity').val() - 1)
      }
  })
  $('button.quantity-right-plus').on('click', function() {
      $('input#quantity').val($('input#quantity').val() - (-1))
  })
</script>
@endsection