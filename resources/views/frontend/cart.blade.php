@extends('frontend.index')
@section('title')
    Giỏ hàng
@endsection
@section('body')
<div
class="hero-wrap hero-bread"
style="background-image: url('images/bg_4.jpg')">
<div class="container">
  <div class="row no-gutters slider-text align-items-center justify-content-center">
    <div class="col-md-9 ftco-animate text-center">
      <p class="breadcrumbs">
        <span class="mr-2"><a href="{{route('user.home')}}">Trang chủ</a></span> /
        <span>Giở hàng</span>
      </p>
      <h1 class="mb-0 bread" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Giỏ hàng của tôi</h1>
    </div>
  </div>
</div>
</div>
<section class="ftco-section ftco-cart">
<div class="container">
  <div class="row">
    <div class="col-md-12 ftco-animate">
      <div class="cart-list">
        <table class="table">
          <thead class="thead-primary">
            <tr class="text-center">
              <th>&nbsp;</th>
              <th>&nbsp;</th>
              <th>Tên sản phẩm</th>
              <th>Giá</th>
              <th>Số lượng</th>
              <th>Tổng giá sản phẩm</th>
            </tr>
          </thead>
          <tbody>
            @if(isset($products) && count($products) >0)
            @foreach($products as $item)
            <!-- END TR-->
            <tr class="text-center">
                <td class="product-remove">
                  <a class="remove-product" cart-id={{$item->id}}><span class="ion-ios-close"></span></a>
                </td>
                <td class="image-prod">
                  <div
                    class="img"
                    style="
                      background-image: url({{ asset(\Storage::url($item->product_img)) }});
                    "
                  ></div>
                </td>
                <td class="product-name">
                  <h3>{{ $item->name }}</h3>
                  {{-- <p>
                    Far far away, behind the word mountains, far from the
                    countries
                  </p> --}}
                </td>
                <td class="price">{{ $item->price }}</td>
                <td class="quantity">
                  <div class="input-group mb-3">
                    <input
                      type="text"
                      name="quantity"
                      class="quantity form-control input-number"
                      value="{{ $item->quantity }}"
                      min="1"
                      max="100"
                      cart-id="{{ $item->id }}"
                      price="{{ $item->price }}"
                    />
                  </div>
                </td>
                <td class="total">{{ $item->price * $item->quantity }}</td>
            </tr>
            @endforeach
            @endif
            <!-- END TR-->
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="row justify-content-end">
    <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
      <div class="cart-total mb-3">
        <h3>Mã giảm giá</h3>
        <p>Nhập mã giảm giá của bạn tại đây (nếu có)</p>
        <form class="info">
          <div class="form-group">
            {{-- <label for="">Coupon code</label> --}}
            <input
              type="text"
              class="form-control text-left px-3"
              placeholder=""
              id="input-coupon"
            />
          </div>
        </form>
      </div>
      <p>
        <a class="btn btn-primary py-3 px-4" id="apply-coupon">Kích hoạt</a>
      </p>
    </div>
    <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
      <div class="form-check disabled mb-2">
        <input class="form-check-input" type="checkbox" name="other-place" id="">
        <label class="form-check-label" for="exampleRadios3">
          Giao hàng cho tôi tại địa điểm khác
        </label>
      </div>
      <div class="cart-total mb-3 hidden" id="choose-other-place">
        <h3>Thông tin địa điểm thay thế</h3>
        <p>Quý khách vui lòng nhập đầy đủ thông tin địa điểm</p>
        <form action="#" class="info">
          <div class="form-group">
            <label for="">Số nhà, tên đường (tên tòa nhà)</label>
            <input
              type="text"
              class="form-control text-left px-3"
              placeholder=""
              id="street-input"
            />
          </div>
          <div class="form-group">
            <label for="country">Phường - Quận, huyện</label>
            <input
              type="text"
              class="form-control text-left px-3"
              placeholder=""
              id="district-input"
            />
          </div>
          <div class="form-group">
            <label for="country">Tình, thành phố</label>
            <input
              type="text"
              class="form-control text-left px-3"
              placeholder=""
              id="city-input"
            />
          </div>
        </form>
      </div>
      {{-- <p>
        <a href="checkout.html" class="btn btn-primary py-3 px-4"
          >Estimate</a
        >
      </p> --}}
    </div>
    <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
      <div class="cart-total mb-3">
        <h3>Thanh toán</h3>
        <p class="d-flex">
          <span>Tổng tiền sản phẩm</span>
          <span id="cart-total">0</span>
          {{-- <span id="cart-total">$20.60</span> --}}
        </p>
        <p class="d-flex">
          <span>Phí vận chuyển</span>
          <span>0</span>
        </p>
        <p class="d-flex">
          <span>Giảm giá</span>
          <span id="coupon-price">0</span>
        </p>
        <hr />
        <p class="d-flex total-price">
          <span>Tổng thanh toán</span>
          <span id="total-price">0</span>
        </p>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="paymentMethod" id="" value="0" checked>
        <label class="form-check-label" for="exampleRadios1">
          Thanh toán sau khi nhận hàng
        </label>
      </div>
      <div class="form-check disabled mb-2">
        <input class="form-check-input" type="radio" name="paymentMethod" id="" value="2" disabled>
        <label class="form-check-label" for="exampleRadios3">
          Thanh toán trực tuyến
        </label>
      </div>
      <p>
        {{-- <a class="btn btn-primary py-3 px-4" id="user-payment"
          >Thực hiện thanh toán</a
        > --}}
        <form action="/cart/payment" method="POST" id="payment-form">
          @csrf
          <input type="hidden" name="street">
          <input type="hidden" name="district">
          <input type="hidden" name="city">
          <input type="hidden" name="total">
          <input type="hidden" name="discount">
          <input type="hidden" name="method">
          <input type="submit" value="Thực hiện thanh toán" class="btn btn-primary py-3 px-4" id="user-payment">
        </form>
      </p>
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="{{asset('')}}js/cart.js"></script>
@endsection