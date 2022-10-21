@extends('frontend.index')
@section('title')
    Thông tin liên lạc
@endsection
@section('body')
<div
      class="hero-wrap hero-bread"
      style="background-image: url('images/bg_2.jpg')"
    >
      <div class="container">
        <div
          class="row no-gutters slider-text align-items-center justify-content-center"
        >
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs">
              <span class="mr-2"><a href="{{route('user.home')}}">Trang chủ</a></span> /
              <span>Liên hệ</span>
            </p>
            <h1 class="mb-0 bread" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Thông tin liên lệ</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="ftco-section contact-section bg-light">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="w-100"></div>
          <div class="col-md-3 d-flex">
            <div class="info bg-white p-4">
              <p>
                <span>Địa chỉ:</span> {{isset($info->address) ? $info->address : ""}}
              </p>
            </div>
          </div>
          <div class="col-md-3 d-flex">
            <div class="info bg-white p-4">
              <p>
                <span>Điện thoại hỗ trợ:</span>
                <a href="tel://1234567920">{{isset($info->phone) ? $info->phone : ""}}</a>
              </p>
            </div>
          </div>
          <div class="col-md-3 d-flex">
            <div class="info bg-white p-4">
              <p>
                <span>Email:</span>
                <a href="mailto:info@yoursite.com">{{isset($info->email) ? $info->email : ""}}</a>
              </p>
            </div>
          </div>
          <div class="col-md-3 d-flex">
            <div class="info bg-white p-4">
              <p><span>Website</span> <a href="#">{{isset($info->url) ? $info->url : ""}}</a></p>
            </div>
          </div>
        </div>
        <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="#" class="bg-white p-5 contact-form">
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Họ tên"
                />
              </div>
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Email"
                />
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Tiêu đề" />
              </div>
              <div class="form-group">
                <textarea
                  name=""
                  id=""
                  cols="30"
                  rows="7"
                  class="form-control"
                  placeholder="Nội dung"
                ></textarea>
              </div>
              <div class="form-group">
                <input
                  type="submit"
                  value="Gửi"
                  class="btn btn-primary py-3 px-5"
                />
              </div>
            </form>
          </div>
          <div class="col-md-6 d-flex">
            {{-- <div id="map" class="bg-white"></div> --}}
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15739726.38985599!2d96.86901966300037!3d15.6073150912184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31157a4d736a1e5f%3A0xb03bb0c9e2fe62be!2zVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1606281842770!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          </div>
        </div>
      </div>
    </section>
@endsection