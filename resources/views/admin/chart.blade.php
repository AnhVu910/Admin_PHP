@extends('admin.master')
@section('css')
    {{-- <link rel="stylesheet" href="{{asset('../css/class.css')}}"> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <style>
        .test{
            border : 1px solid red;
        }
        .p-4{
            padding: 4rem;
        }
        .nav-item{
            padding: 15px 30px 0px 30px;
        }
        .hidden{
            display: none;
        }
        .highcharts-figure, .highcharts-data-table table {
        min-width: 320px; 
        max-width: 660px;
        margin: 1em auto;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #EBEBEB;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }
        .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
        }
        .highcharts-data-table th {
            font-weight: 600;
        padding: 0.5em;
        }
        .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
        padding: 0.5em;
        }
        .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
        }
        .highcharts-data-table tr:hover {
        background: #f1f7ff;
        }
    </style>
@endsection
@section('content')
    <section class="content-header pb-2" style="padding-bottom: 1rem;">
        <h1>
            THỐNG KÊ
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{Route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a>Thống kê</a></li>
        </ol>
    </section>
	<div class="row">
	    <div class="col-xs-12">
	        <div class="box p-4">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Doanh thu |</a>
                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Sản phẩm đã bán |</a>
                      {{-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a> --}}
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active hidden" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" style="padding : 30px;">
                        <div class="group-button" >
                            <button class="btn btn-info" id="btn-revenue">
                                Doanh thu tháng này
                            </button>
                            <button class="btn btn-info" id="btn-custum">
                                Xem theo ngày
                            </button>
                            <div class="row hidden" style="margin-top : 20px; margin-bottom : 20px;" id="revenue-by-date">
                                <div class="col-md-3">
                                    <label for="">từ ngày</label>
                                    <input type="text" name="start-date" id="start-date" class="form-control" placeholder="YYYY/MM/DD">
                                </div>
                                <div class="col-md-3">
                                    <label for="">đến ngày</label>
                                    <input type="text" name="end-date" id="end-date" class="form-control" placeholder="YYYY/MM/DD">
                                </div>
                                <div class="col-md-1">
                                    <label for="">Click để xem</label>
                                    <button class="btn btn-info" id="show">Xem</button>
                                </div>
                            </div>
                        </div>
                        <div class="chart">
                            <figure class="highcharts-figure">
                                <div id="container"></div>
                                <p class="highcharts-description">
                                  Biểu đồ thống kê doanh thu trong tháng. Doanh thu tổng dựa trên doanh thu đơn hàng và phí từ mã giảm giá
                                </p>
                            </figure>
                        </div>
                    </div>
                    <div class="tab-pane fade hidden" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" style="padding:30px;">
                        <div>
                            <h2 class="text-center">Số lượng các sản phẩm đã bán trong tháng {{isset($month) ? $month : ""}}</h2>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="10%">#</th>
                                        <th width="70%">Tên sản phẩm</th>
                                        <th width="20%">Số lượng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($table))
                                    <?php $index = 0 ?>
                                    @foreach ($table as $item)
                                    <?php $index++ ?>
                                    <tr>
                                        <td>{{$index}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->quantity}}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">test 34...</div> --}}
                </div>
	        </div>
	    </div>
	</div>
@endsection

@section('foot')
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    {{-- <script src="{{asset('')}}js/cart.js"></script> --}}
    <script>
        $(document).on('click', '#nav-home-tab', function() {
            $('#nav-home').removeClass('hidden')
            $('#nav-profile').addClass('hidden')
        })
        $(document).on('click', '#nav-profile-tab', function() {
            $('#nav-profile').removeClass('hidden')
            $('#nav-home').addClass('hidden')
        })
        $(document).on('click', '#btn-custum', function() {
            $('#revenue-by-date').removeClass('hidden')
        })
        $(document).on('click', '#btn-revenue', function() {
            $.ajax({
                type: "GET",
                url: "/admin/statistical/get-revenue",
                success: function (response) {
                    buildPie(response.total, response.discount)
                }
            });
        })
        $(document).on('click', '#show', function() {
            startDate = $('input#start-date').val();
            endDate = $('input#end-date').val();
            if (startDate != "" && endDate != "") {
                $.ajax({
                    type: "GET",
                    url: "/admin/statistical/get-revenue-by-date",
                    data: {
                        'startDate' : startDate,
                        'endDate' : endDate
                    },
                    success: function (response) {
                        buildPie(response.total, response.discount)
                    }
                });
            } else {
                alert('Vui lòng nhập ngày bắt đầu và ngày kết thúc')
            }
            
        })
        
    function buildPie(total, discount) {
        let pie_total = total / (total - (-discount))
        let pie_discount = 100 - pie_total
        // Build the chart
        Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Biểu đồ doanh thu tháng'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
                }
            },
            series: [
                {
                name: 'Phần trăm',
                colorByPoint: true,
                data: [{
                    name: 'Doanh thu sau giảm giá : '+total+' VNĐ',
                    y: pie_discount
                }, 
                {
                    name: 'Giảm giá từ mã giảm giá : '+discount+' VNĐ',
                    y: pie_total
                }]
            }]
        });
    }
    </script>
@endsection