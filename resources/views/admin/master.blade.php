<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Admin Page</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset('../css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('../css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('../css/_all-skins.min.css')}}">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{asset('../css/toastr.min.css')}}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>
  @yield('css')
  <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <a class="logo">
        <span class="logo-mini"><b>ADMIN</b></span>
        <span class="logo-lg"><b>Trang quản trị</b></span>
      </a>
      <nav class="navbar navbar-static-top">
        <a class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a class="dropdown-toggle" data-toggle="dropdown">
                <img src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" class="user-image" alt="User Image">
                <span class="hidden-xs">{{Auth::user()->name}}</span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-header">
                  <img src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" class="img-circle" alt="User Image">
                  <p>
                    {{Auth::user()->name}}
                  </p>
                </li>
                <li class="user-footer">
                  <div class="pull-left">
                    <a class="btn btn-default btn-flat btn-change-password">Đổi mật khẩu</a>
                  </div>
                  <div class="pull-right">
                    <a href="{{route('logout')}}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Đăng xuất</a>
                  </div>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <aside class="main-sidebar">
      <section class="sidebar">
        {{-- <div class="user-panel">
          <div class="pull-left image">
            <img src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" class="user-image" alt="User Image">
          </div>
          <div class="pull-left info">
            <span class="hidden-xs">{{Auth::user()->name}} 
            </span>
          </div>
        </div> --}}
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">Danh mục chính</li>
          @if(Auth::user()->role == 1)
          <li class="">
            <a href="{{asset('')}}admin/user">
                <i class="fa fa-users" aria-hidden="true"></i> <span>Quản lý người dùng</span>
            </a>
          </li>
          @endif
          <li class="">
            <a href="{{asset('')}}admin/customer">
                <i class="fa fa-users" aria-hidden="true"></i> <span>Quản lý khách hàng</span>
            </a>
          </li>
          {{-- <li class="">
            <a href="{{asset('')}}admin">
                <i class="fa fa-cog" aria-hidden="true"></i> <span>Thông tin chung</span>
            </a>
          </li> --}}
          {{-- <li class="treeview">
            <a>
              <i class="fa fa-thermometer-empty" aria-hidden="true"></i> <span>Vaccine</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{asset('')}}admin/vaccine"><i class="fa fa-circle-o"></i> Vaccine</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a>
              <i class="fa fa-dashboard"></i> <span>Post</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{asset('')}}admin/post"><i class="fa fa-circle-o"></i> Post</a></li>
            </ul>
          </li> --}}
          {{-- <li class="">
            <a href="{{route('category')}}">
              <i class="fa fa-sitemap" aria-hidden="true"></i> <span>Loại sản phẩm</span>
            </a>
          </li>
          <li class="">
            <a href="{{route('brand')}}">
              <i class="fa fa-meetup" aria-hidden="true"></i> <span>Nhãn hiệu</span>
            </a>
          </li>
          <li class="">
            <a href="{{route('coupon')}}">
              <i class="fa fa-percent" aria-hidden="true"></i> <span>Mã giảm giá</span>
            </a>
          </li>
          <li class="">
            <a href="{{route('product')}}">
              <i class="fa fa-gift" aria-hidden="true"></i> <span>Sản phẩm</span>
            </a>
          </li>
          <li class="">
            <a href="{{asset('')}}admin/order">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span>Đơn hàng</span>
            </a>
          </li>
          <li class="">
            <a href="{{asset('')}}admin/statistical">
              <i class="fa fa-line-chart" aria-hidden="true"></i> <span>Thống kê</span>
            </a>
          </li> --}}
        </ul>
      </section>
    </aside>
    <div class="content-wrapper">
      <section class="content">
        @yield('content')
      </section>
    </div>
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
      </div>
      <strong>Copyright &copy; 2020<a> Mộc Store</a>.</strong> Reserved
    </footer>
    <div class="control-sidebar-bg"></div>
  </div>
  <div class="modal fade modal-change-password" id="modal-change-password">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header  bg-primary text-white">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">Đổi mật khẩu</h4>
	      </div>
	      <div class="modal-body">
	       <form method="POST" action={{ route('admin.change-password') }} id="form-change-password">
	        @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Mật khẩu hiện tại</label>
                <input type="text" name="current_password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
              </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Mật khẩu mới</label>
                <input type="text" name="new_password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nhập lại mật khẩu</label>
                <input type="text" name="repeat_password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
              </div>
	       </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary btn-save" id="change-pass">Cập nhật mật khẩu</button>
	      </div>
	    </div>
	  </div>
	</div>
  <script src="{{asset('../js/jquery.min.js')}}"></script>
  <script src="{{asset('../js/bootstrap.min.js')}}"></script>
  <script src="{{asset('../js/jquery.slimscroll.min.js')}}"></script>
  <script src="{{asset('../js/fastclick.js')}}"></script>
  <script src="{{asset('../js/adminlte.min.js')}}"></script>
  <script src="{{asset('../js/demo.js')}}"></script>
  <script src="{{asset('../js/toastr.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
  <script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
  @yield('foot')
  <script>
    $('.btn-change-password').click(function() {
      $modal = $('#modal-change-password')
	    $modal.modal("toggle")
    })
    $('#change-pass').click(function() {
      $.ajax({ //call ajax để gửi data lên server
        url: $('#form-change-password').attr('action'),
        type : 'POST',
        data: {
          current_password: $('#form-change-password input[name=current_password]').val(),
          new_password: $('#form-change-password input[name=new_password]').val(),
          repeat_password: $('#form-change-password input[name=repeat_password]').val(),
        },
      })
      .done(function(response) {
        // gửi thành công lên server
        if(response.status) { //nếu server trả về kết quả thành công
          $('#modal-change-password').modal('toggle');
          //thông báo thành công
          toastr.success(response.message);
          window.setTimeout(function() {
            window.location.href = "/";
          }, 2000)
        } else { //nếu server trả về kết quả thất bại
          //thông báo thất bại
          toastr.error(response.message);
        }
      })
      .fail(function() { // gửi không thành công lên server
        //thông báo thất bại
        toastr.error(response.message);
      })
    })
  </script>
</body>
</html>