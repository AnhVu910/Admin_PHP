@extends('frontend.index')
@section('title')
    Đặt hàng - Thanh toán
@endsection
@section('body')
<div class="hero-wrap hero-bread"
    style="background-image: url({{asset('images/bg-checkout.jpg')}});">
    <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs">
            <span class="mr-2"><a href="{{route('user.home')}}">Trang chủ</a></span> /
            <span class="mr-2"><a href="{{route('user.cart')}}">Giỏ hàng</a></span> /
            <span>Đặt hàng</span>
        </p>
        <h1 class="mb-0 bread" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Đặt hàng</h1>
        </div>
    </div>
    </div>
</div>
<section class="ftco-section">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-7 ftco-animate">
        <div class="billing-form">
            <h3 class="mb-4 billing-heading">Thông tin đặt hàng</h3>
            <div class="row align-items-end">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="firstname">
                        Họ Tên : 
                        <span id="cus-name">
                            {{isset($data['name']) ? $data['name'] : ""}}
                        </span>
                    </label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="phone">
                        Số điện thoại người nhận : 
                        <span id="cus-phone">
                            {{isset($data['phone']) ? $data['phone'] : ""}}
                        </span>
                    </label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                <label for="emailaddress">
                    Email : 
                    <span id="cus-email">
                        {{isset($data['email']) ? $data['email'] : ""}}
                    </span>
                </label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="streetaddress">
                        Địa chỉ : 
                        <span id="cus-address">
                            {{isset($data['address']) ? $data['address'] : ""}}
                        </span>
                    </label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="phone">
                        Nội dung đơn hàng : 
                        <ul id="cus-content">
                        @if (isset($data['content']))
                        @foreach($data['content'] as $item)
                            <li>{{$item}}</li>
                        @endforeach
                        @endif
                        </ul>
                    </label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="phone">
                        Giảm giá : 
                        <span id="cus-discount">
                            {{isset($data['discount']) ? $data['discount'] : 0}}
                        </span>
                    </label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="phone">
                        Tổng tiền thanh toán : 
                        <span id="cus-total">
                            {{isset($data['total']) ? $data['total'] : ""}}
                        </span>
                    </label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group mt-4">
                    <button class="btn text-white py-3 mb-2" id="order-confirm" style="width:100%; background-color:#82ae46; border-radius:0px;">
                        XÁC NHẬN ĐẶT HÀNG
                    </button>
                    <button class="btn text-white py-3 mb-2 hidden" id="return-home" style="width:100%; background-color:#82ae46; border-radius:0px;">
                        <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> QUAY LẠI
                    </button>
                    <button class="btn text-white py-3 mb-2" id="cancel" style="width:100%; background-color:#5f615c; border-radius:0px;">
                        <i class="fa fa-ban" aria-hidden="true"></i> HỦY
                    </button>
                </div>
            </div>
            </div>
        </div>
        <!-- END -->
        </div>
    </div>
</div>
</section>
@endsection
@section('script')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="{{asset('')}}js/cart.js"></script>
@endsection