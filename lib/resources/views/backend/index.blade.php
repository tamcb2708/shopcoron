@extends('backend.master')
@section('title','Trang Chủ')
@section('main')
  <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <style type="text/css">
    p.title_thongke{
        text-align: center;
        font-size: 20px;
        font-weight: bold;
    }
</style>
<div class="row">
    <p class="title_thongke">Thống Kế Doanh Số</p>
    <form autocomplete="off">
        {{csrf_field()}}
        <div class="col-md-12">
            <p>Từ ngày: <input type="text" id="datepicker" class="form-control" name=""></p>
        </div>
        <div class="col-md-12">
            <p>Đến Ngày: <input type="text" id="datepicker2" class="form-control" name=""></p>
        </div>
        <div class="col-md-12">
            <p>Lọc Theo: 
                <select class="dashboard-filter form-control">
                    <option value="0">Chọn</option>
                    <option value="7ngay">7 ngày qua</option>
                    <option value="thangtruoc">tháng trước</option>
                    <option value="thangnay">tháng này</option>
                    <option value="365ngayqua">năm qua</option>
                </select>
            </p>
        </div>
         <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc Kết Quả" name="">
    </form>

    <div class="col-md-12">
        <div id="myfirstchart" style="height: 250px;"></div>
    </div>
</div>
<div class="row">
    <p class="title_thongke">Thống Kê Lượt Truy Cập</p>
    <table class="table table-bordered table-dark">
        <thead>
            <th scope="col">Đang Onnline</th>
            <th scope="col">Trong Tháng Trước</th>
            <th scope="col">Trong Tháng Này</th>
            <th scope="col">Trong Năm Nay</th>
            <th scope="col">Tổng</th>
        </thead>
        <tbody>
            <td>{{$visitors_count}}</td>
            <td>{{$visitor_last_month_count}}</td>
            <td>{{$visitor_of_thismonth_count}}</td>
            <td>{{$visitor_of_year_count}}</td>
            <td>{{$visitor_total}}</td>
        </tbody>
    </table>
</div>
<div class="row">
     <div class="col-md-6 ">
         <p class="title_thongke">Thống Kê</p>
         <div class="donutt" id="donutt"></div>
     </div>
       <div class="col-md-6">
        <h3>Bài Viết Được Nhiều Người Xem</h3>
        <ol class="list_views">
             @foreach($blog_view as $bl)
            <li>
               <a target="blank" href="{{asset('chi-tiet/blog/'.$bl->bl_id)}}">{{$bl->bl_name}}| Lượt Xem: <span style="color: black;">{{$bl->bl_view}}</span></a>
            </li>
             @endforeach
        </ol>
    </div>

</div>
<div class="row">
    <style type="text/css">
        ol.list_views{
            margin: 10px 0;
            color: #fff;
        }
        ol.list_views a{
            color: red;
            font-weight: 400;
        }
    </style>
    <div class="col-md-6">
        <h3>Sản Phẩm Được Nhiều Người Xem</h3>
         <table class="table table-bordered" style="padding: 300px width: 50%; height: 100%;">
                                        <thead>
                                             <tr class="bg-primary">
                                            <th>Tên Sản Phẩm</th>
                                            <th>Hình Ảnh</th>
                                            <th>Lượt Xem</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($product_view as $da)
                                            <tr>
                                            <td><a href="{{asset('detail/'.$da->prod_id)}}">{{$da->prod_name}}</a></td>
                                            <td><img width="100px" height="137px" src="{{asset('public/anhSanPham/'.$da->prod_img)}}"></td> 
                                            <td>{{$da->prod_view}} Lượt</td>                           
                                            </tr>
                                          @endforeach
                                        </tbody>                                     
                                    </table>
    </div>
    <div class="col-md-6">
        <h3>Sản Phẩm Được Nhiều Người Mua</h3>
        <table class="table table-bordered" style="padding: 300px width: 50%; height: 100%;">
                                        <thead>
                                             <tr class="bg-primary">
                                            <th>Tên Sản Phẩm</th>
                                            <th>Hình Ảnh</th>
                                            <th>Lượt Mua</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($pro as $da)
                                            <tr>
                                            <td><a href="{{asset('detail/'.$da->prod_id)}}">{{$da->prod_name}}</a></td>
                                            <td><img width="100px" height="137px" src="{{asset('public/anhSanPham/'.$da->prod_img)}}"></td> 
                                            <td>{{$da->prod_sold}} Lượt</td>                           
                                            </tr>
                                          @endforeach
                                        </tbody>                                     
                                    </table>
    </div>
</div>

                       
                </main>
           </div>

@stop