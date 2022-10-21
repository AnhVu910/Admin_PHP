@extends('admin.master')
@section('css')
	{{-- <link rel="stylesheet" href="{{asset('../css/class.css')}}"> --}}
@endsection
@section('content')
    {{-- <section class="content-header pb-2" style="padding-bottom: 1rem;">
        <h1>
            QUẢN LÝ NGƯỜI DÙNG
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
	        <h1 class="text-primary" style="font-weight:bold;">DANH SÁCH NGƯỜI DÙNG HỆ THỐNG</h1>
	      </div>
	      <div class="box-body">
			<div class="text-right"><button class="btn btn-success" id="btn-add-user">Thêm mới người dùng hệ thống</button></div>
	       <div class="table-responsive">
	        <table class="table table-hover table-responsive">
	          <thead>
	            <tr>
	              <th>#</th>
	              <th>Tên người dùng</th>
	              <th>Email</th>
	              <th>Phân quyền</th>
	              <th>Tác vụ</th>
	            </tr>
	          </thead>
	          <tbody>
	           @if (isset($users) && count($users) > 0)
		           @foreach ($users as $user)
		           <tr>
		           <td>{{$user->id}}</td>
		           <td>{{$user->name}}</td>
		           <td>{{$user->email}}</td>
		           @if ($user->role == 1)
		           <td>Admin</td>
		           @elseif($user->role == 2)
		           <td>Nhân viên</td>
		           @elseif($user->role == 3)
		           <td>Khách</td>
		           @endif
		           <td>
					@if(Auth::user()->role == 1)
		            <a class="btn btn-primary btn-change" data-toggle="modal" href='#modal-id' data-id="{{$user->id}}"><i class="fa fa-refresh" aria-hidden="true"></i> Phân quyền</a>
					<button class="btn btn-warning btn-edit" data-user="{{ json_encode($user) }}"><i class="fa fa-pencil-square" aria-hidden="true"></i> Cập nhật</button>
					<button class="btn btn-danger btn-delete delete-user" data-id={{$user->id}}><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button>
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

	{{-- modal thay đổi quyền user --}}
	<div class="modal fade" id="modal-id">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header bg-primary text-white">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">Phân quyền</h4>
	      </div>
	      <div class="modal-body">
	       <form method="POST">
	        @csrf
	          <select name="" id="state" class="form-control" required="required">
	          <option value="1" class="yes">Admin</option>
	          <option value="2" class="no">Nhân viên</option>
	          {{-- <option value="3" class="no">Khách</option> --}}
	        </select>
	       </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary btn-save" id="save-user">Thực hiện phân quyền</button>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade modal-edit" id="modal-edit">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header bg-primary text-white">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">Cập nhật người dùng</h4>
	      </div>
	      <div class="modal-body">
	       <form method="POST" action={{ route('user.edit') }} id="edit-form">
	        @csrf
				<div class="form-group">
				  <label for="exampleInputEmail1">Tên người dùng</label>
				  <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
				  {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
				</div>
				<div class="form-group">
				  <label for="exampleInputEmail1">Địa chỉ email</label>
				  <input type="text" name="email" class="form-control" readonly id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
				  {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
				</div>
				<div class="form-group">
				  <label for="exampleInputPassword1">Mật khẩu</label>
				  <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
				</div>
				<div class="form-group">
				  <label for="exampleInputPassword1">Phân quyền</label>
				  <select name="role" id="state" class="form-control" required="required">
					<option value="1" class="yes">Admin</option>
					<option value="2" class="no">Nhân viên</option>
					{{-- <option value="3" class="no">Khách</option> --}}
				  </select>
				</div>
				<input type="hidden" name="user_id">
	       </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary btn-save" id="save-user-edit">Lưu thông tin</button>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade modal-edit" id="modal-add">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header bg-primary text-white">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">Thêm mới người dùng</h4>
	      </div>
	      <div class="modal-body">
	       <form method="POST" action={{ route('user.add') }} id="add-form">
	        @csrf
				<div class="form-group">
				  <label for="exampleInputEmail1">Tên người dùng</label>
				  <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên người dùng">
				  {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
				</div>
				<div class="form-group">
				  <label for="exampleInputEmail1">Địa chỉ email</label>
				  <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập địa chỉ email email">
				  {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
				</div>
				<div class="form-group">
				  <label for="exampleInputPassword1">Mật khẩu</label>
				  <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập mật khẩu">
				</div>
				<div class="form-group">
				  <label for="exampleInputPassword1">Phân quyền</label>
				  <select name="role" id="state" class="form-control" required="required">
					<option value="1" class="yes">Admin</option>
					<option value="2" class="no">Nhân viên</option>
					{{-- <option value="3" class="no">Khách</option> --}}
				  </select>
				</div>
	       </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary btn-save" id="store-user">Thêm mới người dùng</button>
	      </div>
	    </div>
	  </div>
	</div>
@endsection

@section('foot')
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="{{asset('')}}js/user.js"></script>
@endsection