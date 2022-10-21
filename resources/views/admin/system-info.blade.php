@extends('admin.master')
@section('css')
	{{-- <link rel="stylesheet" href="{{asset('../css/class.css')}}"> --}}
@endsection
@section('content')
    <section class="content-header pb-2" style="padding-bottom: 1rem;">
        <h1>
            THÔNG TIN CHUNG
        </h1>
        <ol class="breadcrumb">
            <li><a><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
    </section>
	<div class="row">
	    <div class="col-xs-12">
	        <div class="box">
                <div class="box-header text-center">
                <h3 class="box-title font-weight-bold p-1 font-30">Thông tin website</h3>
                </div>
	            <div class="box-body container">
                    <div>
                        <div class="form-group">
                            <label for="">Đường dẫn website</label>
                            <input type="text" class="form-control" id="url" value="{{isset($info->url) ? $info->url : ""}}">
                        </div>
                        <div class="form-group">
                          <label for="">Địa chỉ cửa hàng</label>
                          <input type="text" class="form-control" id="address" value="{{isset($info->address) ? $info->address : ""}}">
                        </div>
                        <div class="form-group">
                          <label for="">Địa chỉ email</label>
                          <input type="text" class="form-control" id="email" value="{{isset($info->email) ? $info->email : ""}}">
                        </div>
                        <div class="form-group">
                          <label for="">Số điện thoại hỗ trợ</label>
                          <input type="text" class="form-control" id="phone" value="{{isset($info->phone) ? $info->phone : ""}}">
                        </div>
                        {{-- <div class="form-group">
                          <label for="">Code nhúng iframe google map</label>
                          <input type="text" class="form-control" id="" placeholder="">
                        </div> --}}
                        <div class="form-group">
                          <label for="">Nội dung giới thiệu</label>
                          <textarea name="" id="content" cols="30" rows="10" class="form-control">{{isset($info->content) ? $info->content : ""}}</textarea>
                        </div>
                        <button class="btn btn-primary" id="update-info">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
	</div>
@endsection

@section('foot')
	<script src="{{asset('')}}js/system.js"></script>
@endsection