@extends('admin.master')
@section('css')
	{{-- <link rel="stylesheet" href="{{asset('../css/class.css')}}"> --}}
@endsection
@section('content')
    {{-- <section class="content-header pb-2" style="padding-bottom: 1rem;">
        <h1>
            QUẢN LÝ KHÁCH HÀNG
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{Route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a>Phân quyền</a></li>
        </ol>
    </section> --}}
	<div class="row">
	  <div class="col-xs-12">
	    <div class="box">
			
	      <div class="box-header text-center">
	        <h1 class="text-primary" style="font-weight:bold;">DANH SÁCH KHÁCH HÀNG</h1>
	      </div>
	      <div class="box-body">
			<div class="text-right"><button class="btn btn-success" id="btn-add-customer">Thêm mới khách hàng</button></div>
	       <div class="table-responsive">
	        <table class="table table-hover table-responsive">
	          <thead>
	            <tr>
	              <th>#</th>
	              <th>Tên khách hàng</th>
	              <th>Email</th>
	              <th>Địa chỉ</th>
	              <th>Mã định danh</th>
	              <th>Ghi chú</th>
	              <th></th>
	            </tr>
	          </thead>
	          <tbody>
	           @if (isset($users) && count($users) > 0)
		           @foreach ($users as $user)
		           <tr>
		           <td>{{$user->customer_code}}</td>
		           <td>{{$user->name}}</td>
		           <td>{{$user->email}}</td>
		           <td>{{$user->address}}</td>
		           <td>{{$user->identify_code}}</td>
		           <td>{{$user->customer_note}}</td>
		           <td>
					@if(Auth::user()->role == 1)
					<button class="btn btn-warning btn-edit-customer" data-user="{{ json_encode($user) }}"><i class="fa fa-pencil-square" aria-hidden="true"></i> Edit</button>
					<button class="btn btn-danger btn-delete delete-customer" data-id={{$user->id}}><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
					@endif
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

	<div class="modal fade modal-edit-customer" id="modal-edit-customer">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header v bg-primary text-white">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">Cập nhật khách hàng</h4>
	      </div>
	      <div class="modal-body">
	       <form method="POST" action={{ route('customer.edit') }} id="edit-form-customer">
	        @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Tên khách hàng</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên khách hàng">
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Địa chỉ</label>
                <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập địa chỉ">
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Địa chỉ email</label>
                <input type="text" name="email" class="form-control" readonly id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập địa chỉ email email">
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Mã định danh</label>
                <input name="identify_code" type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập mã định danh">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Ghi chú</label>
                <textarea name="customer_note" class="form-control" id="" cols="30" rows="3"></textarea>
              </div>
				<input type="hidden" name="user_id">
	       </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary btn-save" id="save-customer-edit">Cập nhật thông tin</button>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade modal-edit" id="modal-add-customer">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header  bg-primary text-white">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">Thêm mới khách hàng</h4>
	      </div>
	      <div class="modal-body">
	       <form method="POST" action={{ route('customer.add') }} id="add-form-customer">
	        @csrf
				<div class="form-group">
				  <label for="exampleInputEmail1">Tên khách hàng</label>
				  <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên khách hàng">
				  {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
				</div>
				<div class="form-group">
				  <label for="exampleInputEmail1">Địa chỉ</label>
				  <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập địa chỉ">
				  {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
				</div>
				<div class="form-group">
				  <label for="exampleInputEmail1">Địa chỉ email</label>
				  <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập địa chỉ email email">
				  {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
				</div>
				<div class="form-group">
				  <label for="exampleInputPassword1">Mã định danh</label>
				  <input name="identify_code" type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập mã định danh">
				</div>
				<div class="form-group">
				  <label for="exampleInputPassword1">Ghi chú</label>
				  <textarea name="customer_note" class="form-control" id="" cols="30" rows="3"></textarea>
				</div>
	       </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary btn-save" id="store-customer">Thêm mới khách hàng</button>
	      </div>
	    </div>
	  </div>
	</div>
@endsection

@section('foot')
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="{{asset('')}}js/user.js"></script>
@endsection