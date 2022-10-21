@extends('frontend.index')
@section('title')
    Về chúng tôi
@endsection
@section('body')
<div
      class="hero-wrap hero-bread"
      style="
        background-image: url(images/bg_5.jpg);
      "
    >
      <div class="container">
        <div
          class="row no-gutters slider-text align-items-center justify-content-center"
        >
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs">
              <span class="mr-2"><a href="{{route('user.home')}}">Trang chủ</a></span> /
              <span>Giới thiệu</span>
            </p>
            <h1 class="mb-0 bread" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Về chúng tôi</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
      <div class="container">
        <div class="row">
          <div
            class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center"
            style="background-image: url(images/about.jpg)"
          >
            <a
              href="https://vimeo.com/45830194"
              class="icon popup-vimeo d-flex justify-content-center align-items-center"
            >
              <span class="icon-play"></span>
            </a>
          </div>
          <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
            <div class="heading-section-bold mb-4 mt-md-5">
              <div class="ml-md-0">
                <h2 class="mb-4">Chào mừng bạn đến với chúng tôi - MỘC store</h2>
              </div>
            </div>
            <div class="pb-md-5">
              <p>
                {{-- Far far away, behind the word mountains, far from the countries
                Vokalia and Consonantia, there live the blind texts. Separated
                they live in Bookmarksgrove right at the coast of the Semantics,
                a large language ocean. --}}
                {{isset($info->content) ? $info->content : ""}}
              </p>
              <p><a href="#" class="btn btn-primary">Xem thêm</a></p>
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
              Đăng ký nhận thông tin
            </h2>
            <span>Những ưu đãi tốt nhất sẽ được chúng tôi gửi đến bạn</span
            >
          </div>
          <div class="col-md-6 d-flex align-items-center">
            <form action="#" class="subscribe-form">
              <div class="form-group d-flex">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Email"
                />
                <input type="submit" value="Đăng ký" class="submit px-3" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
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
@endsection