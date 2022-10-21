@extends('frontend.index')
@section('title')
    Thông tin cá nhân
@endsection
@section('css')
    <style>
      input.form-control{
        color : black !important;
      }
    </style>
@endsection
@section('body')
    
    <div
      class="hero-wrap hero-bread"
      style="background-image: url(images/bg-checkout.jpg);">
      <div class="container">
        <div
          class="row no-gutters slider-text align-items-center justify-content-center"
        >
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs">
              <span class="mr-2"><a href="{{route('user.home')}}">Trang chủ</a></span> /
              <span>Thông tin</span>
            </p>
            <h1 class="mb-0 bread" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Thông tin khách hàng</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
            <div class="billing-form">
              <h3 class="mb-4 billing-heading">Thông tin khách hàng</h3>
              <small class=" d-block text-danger my-3">*Vui lòng cung cấp các thông tin để thực hiện thanh toán</small>
              <div class="row align-items-end">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="firstname">Họ Tên</label>
                    <input type="text" class="form-control" placeholder="Họ và tên người mua hàng" id="name"
                    @if(isset($user))
                    value="{{$user->name}}"
                    @endif
                    />
                  </div>
                </div>
                {{-- <div class="col-md-6">
                  <div class="form-group">
                    <label for="lastname">Tên</label>
                    <input type="text" class="form-control" placeholder="" />
                  </div>
                </div> --}}
                <div class="w-100"></div>
                {{-- <div class="col-md-12">
                  <div class="form-group">
                    <label for="country">Quốc gia</label>
                    <div class="select-wrap">
                      <div class="icon">
                        <span class="ion-ios-arrow-down"></span>
                      </div>
                      <select name="" id="" class="form-control">
                        <option value="">Việt Nam</option>
                        <option value="">France</option>
                        <option value="">Italy</option>
                        <option value="">Philippines</option>
                        <option value="">South Korea</option>
                        <option value="">Hongkong</option>
                        <option value="">Japan</option>
                      </select>
                    </div>
                  </div>
                </div> --}}
                <div class="w-100"></div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="streetaddress">Địa chỉ</label>
                    <input
                      type="text"
                      class="form-control"
                      id="address"
                      placeholder="Số nhà và tên đường"
                      @if(isset($data->address))
                      value="{{$data->address}}"
                      @endif
                    />
                  </div>
                </div>
                {{-- <div class="col-md-6">
                  <div class="form-group">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Tòa nhà, căn hộ, đơn vị, ...: (nếu có)"
                    />
                  </div>
                </div> --}}
                <div class="w-100"></div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="towncity">Tỉnh / Thành phố</label>
                    <input type="text" class="form-control" placeholder="Nhập tên tỉnh / thành phô" id="city"
                    @if(isset($data->city))
                    value="{{$data->city}}"
                    @endif
                    />
                  </div>
                </div>
                {{-- <div class="col-md-6">
                  <div class="form-group">
                    <label for="postcodezip">Mã bưu chính / ZIP *</label>
                    <input type="text" class="form-control" placeholder="" />
                  </div>
                </div> --}}
                <div class="w-100"></div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" class="form-control" placeholder="Số điện thoại" id="phone"
                    @if(isset($data->phone))
                    value="{{$data->phone}}"
                    @endif
                    />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="emailaddress">Email</label>
                    <input type="text" class="form-control" placeholder="Email" 
                    @if(isset($user))
                    value="{{$user->email}}"
                    disabled
                    @endif
                    />
                  </div>
                </div>
                <div class="w-100"></div>
                <div class="col-md-12">
                  <div class="form-group mt-4">
                    <div class="radio">
                      {{-- <label class="mr-3"
                        ><input type="radio" name="optradio" /> Create an
                        Account?
                      </label> --}}
                      {{-- <label><input type="radio" name="optradio" /> Ship to different address</label> --}}
                    </div>
                  </div>
                </div>
                <div class="w-100"></div>
                <div class="col-md-12">
                  <div class="form-group mt-4">
                    {{-- <div class="radio"> --}}
                      <button class="btn text-white py-3" id="update-info" style="width:100%; background-color:#82ae46; border-radius:0px;">Cập nhật thông tin</button>
                    {{-- </div> --}}
                  </div>
                </div>
              </div>
            </div>
            <!-- END -->
          </div>

          {{-- <div class="col-xl-5">
            <div class="row mt-5 pt-3">
              <div class="col-md-12 d-flex mb-5">
                <div class="cart-detail cart-total p-3 p-md-4">
                  <h3 class="billing-heading mb-4">Cart Total</h3>
                  <p class="d-flex">
                    <span>Subtotal</span>
                    <span>$20.60</span>
                  </p>
                  <p class="d-flex">
                    <span>Delivery</span>
                    <span>$0.00</span>
                  </p>
                  <p class="d-flex">
                    <span>Discount</span>
                    <span>$3.00</span>
                  </p>
                  <hr />
                  <p class="d-flex total-price">
                    <span>Total</span>
                    <span>$17.60</span>
                  </p>
                </div>
              </div>
              <div class="col-md-12">
                <div class="cart-detail p-3 p-md-4">
                  <h3 class="billing-heading mb-4">Payment Method</h3>
                  <div class="form-group">
                    <div class="col-md-12">
                      <div class="radio">
                        <label
                          ><input type="radio" name="optradio" class="mr-2" />
                          Direct Bank Tranfer</label
                        >
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <div class="radio">
                        <label
                          ><input type="radio" name="optradio" class="mr-2" />
                          Check Payment</label
                        >
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <div class="radio">
                        <label
                          ><input type="radio" name="optradio" class="mr-2" />
                          Paypal</label
                        >
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <div class="checkbox">
                        <label
                          ><input type="checkbox" value="" class="mr-2" /> I
                          have read and accept the terms and conditions</label
                        >
                      </div>
                    </div>
                  </div>
                  <p>
                    <a href="#" class="btn btn-primary py-3 px-4"
                      >Place an order</a
                    >
                  </p>
                </div>
              </div>
            </div>
          </div> --}}

          <!-- .col-md-8 -->
        </div>
      </div>
    </section>
    <!-- .section -->
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
	<script src="{{asset('')}}js/info.js"></script>
@endsection