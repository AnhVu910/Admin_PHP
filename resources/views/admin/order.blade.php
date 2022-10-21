@extends('admin.master')
@section('css')
	{{-- <link rel="stylesheet" href="{{asset('../css/class.css')}}"> --}}
@endsection
@section('content')
    <section class="content-header pb-2" style="padding-bottom: 1rem;">
        <h1>
            QUẢN LÝ ĐƠN HÀNG
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{Route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a>Đơn hàng</a></li>
        </ol>
    </section>
	<div class="row">
	  <div class="col-xs-12">
	    <div class="box">
	      <div class="box-header text-center">
	        <h3 class="box-title font-weight-bold p-1 font-30">Danh sách đơn hàng</h3>
	      </div>
	      <div class="box-body">
	       <div class="table-responsive">
	        <table class="table table-hover table-responsive">
	          <thead>
	            <tr>
	              <th>#</th>
	              <th>Tên khách hàng</th>
	              <th>Phone</th>
	              <th>Email</th>
	              <th>Địa chỉ nhận hàng</th>
	              <th>Sản phẩm đặt hàng</th>
	              <th>Giảm giá</th>
	              <th>Tổng thanh toán</th>
	              <th>Trạng thái</th>
	              <th>Tác vụ</th>
	            </tr>
	          </thead>
	          <tbody>
	           @if (isset($list) && count($list) > 0)
		           @foreach ($list as $item)
		           <tr>
		           <td>{{$item->id}}</td>
		           <td>{{$item->customer_name}}</td>
		           <td>{{$item->phone}}</td>
		           <td>{{$item->email}}</td>
		           <td>{{$item->address}}</td>
		           <td>{{$item->products}}</td>
		           <td>{{$item->discount}}</td>
		           <td>{{$item->total}}</td>
		           <td>{{$item->state}}</td>
		           <td>
		            <a class="btn btn-info btn-change" data-toggle="modal" href='#modal-id' data-id="{{$item->id}}">Cập nhật</a>
		           </td>
		           </tr>
		          
		           @endforeach
	           @endif

	          </tbody>
	        </table>
	      </div>
	    </div>
	  </div>
	</div>
	</div>

	{{-- modal thay đổi quyền user --}}
	<div class="modal fade" id="modal-id">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">Cập nhật thanh toán</h4>
	      </div>
	      <div class="modal-body">
	       <form method="POST">
	        @csrf
	          <select name="" id="state" class="form-control" required="required">
	          <option value="0" class="yes">Chờ thanh toán</option>
	          <option value="1" class="no">Đã thanh toán</option>
	          <option value="2" class="no">Hủy đơn hàng</option>
	        </select>
	       </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary btn-save" id="save-user">Lưu</button>
	      </div>
	    </div>
	  </div>
	</div>
@endsection

@section('foot')
	<script src="{{asset('')}}js/cart.js"></script>
@endsection