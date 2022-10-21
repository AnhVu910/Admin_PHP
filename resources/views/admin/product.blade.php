@extends('admin.master')
@section('css')
	{{-- <link rel="stylesheet" href="{{asset('../css/class.css')}}"> --}}
@endsection
@section('content')
    <section class="content-header pb-2" style="padding-bottom: 1rem;">
        <h1>
            QUẢN LÝ SẢN PHẨM
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{Route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a>Sản phẩm</a></li>
        </ol>
    </section>
	<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header text-center">
              <h3 class="box-title font-weight-bold p-1 font-30">DANH SÁCH SẢN PHẨM</h3>
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
                     <a data-toggle="modal" href='#class-modal' class="btn btn-sm btn-success">Thêm mới sản phẩm</a>
                 @endif
             <div class="table-responsive">
              <table class="table table-hover table-responsive">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Tên sản phẩm</th>
                    <th>Phân loại</th>
                    <th>Nhãn hiệu</th>
                    <th>Số lượng</th>
                    <th width="30%">Mô tả</th>
                    <th>Giá</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Tác vụ</th>
                  </tr>
                </thead>
                <tbody>
                 @if (isset($products) && count($products) > 0)
                 <?php $index = 1 ?>
                     @foreach ($products as $class)
                     <tr>
                     <td><?= $index ?></td>
                     <td>{{$class->name}}</td>
                     <td>{{$class->category_name}}</td>
                     <td>{{$class->brand_name}}</td>
                     <td>{{$class->quantity}}</td>
                     <td>{{$class->description}}</td>
                     <td>{{$class->price}}</td>
                     <td><img class="class-image" style="width: 50px; height: 50px;" src="{{ asset(\Storage::url($class->product_img)) }}"></td>
                     <td>
                          @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                            <a data-toggle="modal" href='#class-modal' class="btn btn-warning btn-edit-class"
                            product-id="{{$class->id}}" name="{{$class->name}}" des="{{$class->description}}"
                            price="{{$class->price}}" brand-id="{{$class->brand_id}}" quantity="{{$class->quantity}}"
                            <?php $temp = "" ?>
                            @foreach($class->category_id as $i => $item)
                            <?php $temp =  $temp.",".$item ?>
                            @endforeach
                            category-id="{{$temp}}"
                            >Edit</a>
                            <a data-toggle="modal" href='#class-modal-1' class="btn btn-info btn-add-quantity"
                            product-id="{{$class->id}}">Nhập hàng</a>
                           <button class="btn btn-danger btn-delete-class" product-id="{{$class->id}}">Xóa</button>
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
              <h4 class="modal-title">Sản phẩm</h4>
            </div>
            <form method="POST" action="{{asset('')}}admin/product/save" enctype="multipart/form-data">
            <div class="modal-body">
              @csrf
                  <input type="hidden" class="form-control" value="" name="productID" required="required">
                  <label>Tên sản phẩm</label>
                  <input type="text" class="form-control" id="" name="productName" required="required">
                  <br>
                  <label>Số lượng</label>
                  <input type="text" class="form-control" id="" name="quantity" required="required">
                  <br>
                  <label>Giá tiền</label>
                  <input type="text" class="form-control" id="" name="price" required="required">
                  <br>
                  <label>Mô tả</label>
                  {{-- <input type="text" class="form-control" id="" name="productDes" required="required"> --}}
                  <textarea name="productDes" class="form-control" cols="30" rows="10" required="required"></textarea>
                  <br>
                  <label>Nhãn hiệu</label>
                  <select name="brandID" class="form-control" id="">
                    @if(isset($brands) && count($brands) > 0)
                    @foreach($brands as $item)
                      <option value="{{$item->id}}">{{$item->brand_name}}</option>
                    @endforeach
                    @endif
                  </select>
                  <br>
                  <label>Phân loại sản phẩm</label>
                  <div class="form-group row">
                    @if(isset($categories) && count($categories) > 0)
                    @foreach($categories as $item)
                    <div class="form-check col-lg-6 col-md-12">
                      <input class="form-check-input" type="checkbox" name="categoryID[]" value="{{$item->id}}">
                      <label class="form-check-label" for="gridCheck">
                        {{$item->name}}
                      </label>
                    </div>
                    @endforeach
                    @endif
                  </div>
                  <br>
                  <label>Ảnh sản phẩm</label>
                  <input type="file" class="form-control-file" id="" name="productFile" required="required">
                  <br>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-save" id="">Lưu</button>
            </div>
          </div>
          </form>
        </div>
    </div>

	<div class="modal fade" id="class-modal-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Nhập hàng</h4>
            </div>
            <form method="POST" action="{{asset('')}}admin/product/add-quantity" enctype="multipart/form-data">
            <div class="modal-body">
              @csrf
                  <input type="hidden" class="form-control" value="" name="productID" required="required">
                  <label>Số lượng</label>
                  <input type="text" class="form-control" id="" name="add_quantity" required="required">
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-save-quantity" id="">Lưu</button>
            </div>
          </div>
          </form>
        </div>
    </div>
@endsection

@section('foot')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="{{asset('')}}js/product.js"></script>
@endsection