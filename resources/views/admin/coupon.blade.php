@extends('admin.master')
@section('css')
	{{-- <link rel="stylesheet" href="{{asset('../css/class.css')}}"> --}}
@endsection
@section('content')
    <section class="content-header pb-2" style="padding-bottom: 1rem;">
        <h1>
            QUẢN LÝ MÃ GIẢM GIÁ
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{Route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a>Mã giảm giá</a></li>
        </ol>
    </section>
	<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header text-center">
              <h3 class="box-title font-weight-bold p-1 font-30">DANH SÁCH MÃ GIẢM GIÁ</h3>
            </div>
            {{-- <form method="GET" action="{{route('class.search')}}" id="form-search">
                @csrf
                <div class="search-title">Search Classroom</div>
                <div class="search-class row">
                    <div class="col-lg-2 col-md-12">
                        <select class="form-control" name="selectType">
                            <option value="name">Search by class name</option>
                            <option value="room">Search by room</option>
                            <option value="subject">Search by subject</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-12">
                        <input type="text" name="searchData" class="form-control" placeholder="enter the value to find class">
                    </div>
                    <div class="col-lg-2 col-md-12">
                        <input type="submit" class="btn btn-info" value="Search">
                    </div>
                </div>
            </form> --}}
            <div class="box-body">
                {{-- nút tạo mới lớp học chỉ được hiển thị khi người dùng là admin hoặc teacher --}}
                 @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                     <a data-toggle="modal" href='#class-modal' class="btn btn-sm btn-success">Thêm mới mã giảm giá</a>
                 @endif
             <div class="table-responsive">
              <table class="table table-hover table-responsive">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Mã giảm giá</th>
                    <th>Số lượng</th>
                    <th>Phần trăm giảm giá</th>
                    <th>Ngày bắt đầu</th>
                    <th>Ngày hết hạn</th>
                    <th>Mô tả</th>
                    <th>Tác vụ</th>
                  </tr>
                </thead>
                <tbody>
                 @if (isset($coupons) && count($coupons) > 0)
                 <?php $index = 1 ?>
                     @foreach ($coupons as $class)
                     <tr>
                     <td><?= $index ?></td>
                     <td>{{$class->code}}</td>
                     <td>{{$class->quantity}}</td>
                     <td>{{$class->percent}}</td>
                     <td>{{$class->start}}</td>
                     <td>{{$class->expired}}</td>
                     <td>{{$class->coupon_description}}</td>
                     {{-- <td><img class="class-image" style="width: 50px; height: 50px;" src="{{ asset(\Storage::url($class->image_url)) }}"></td> --}}
                     <td>
                             @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                          <a data-toggle="modal" href='#class-modal' class="btn btn-warning btn-edit-class"
                              coupon-id="{{$class->id}}" code="{{$class->code}}" des="{{$class->coupon_description}}"
                              percent="{{$class->percent}}" start="{{$class->start}}" expired="{{$class->expired}}"
                              quantity="{{$class->quantity}}"
                              >Edit</a>
                           <button class="btn btn-danger btn-delete-class" coupon-id="{{$class->id}}">Delete</button>
                           @endif
                     </td>
                     </tr>
                    <?php $index ++ ?>
                    @endforeach
                 @endif
  
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>

	{{-- modal tạo mới, sửa class --}}
	<div class="modal fade" id="class-modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Mã giảm giá</h4>
            </div>
            <form method="POST" action="{{asset('')}}admin/coupon/save" enctype="multipart/form-data">
            <div class="modal-body">
              @csrf
                  <input type="hidden" class="form-control" value="" name="couponID" required="required">
                  <label>Mã code</label>
                  <input type="text" class="form-control" id="" name="couponCode" required="required">
                  <br>
                  <label>số lượng</label>
                  <input type="text" class="form-control" id="" name="quantity" required="required">
                  <br>
                  <label>Phần trăm giảm</label>
                  <input type="text" class="form-control" id="" name="percent" required="required">
                  <br>
                  <label>Ngày bắt đầu</label>
                  <input type="text" class="form-control" id="" name="start" required="required" placeholder="YYYY/MM/DD">
                  <br>
                  <label>Ngày hết hạn</label>
                  <input type="text" class="form-control" id="" name="expired" required="required" placeholder="YYYY/MM/DD">
                  <br>
                  <label>Mô tả</label>
                  <input type="text" class="form-control" id="" name="couponDes" required="required">
                  <br>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-save" id="">Lưu</button>
            </div>
          </div>
          </form>
        </div>
    </div>
@endsection

@section('foot')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="{{asset('')}}js/coupon.js"></script>
@endsection