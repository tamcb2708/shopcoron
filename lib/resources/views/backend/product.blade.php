@extends('backend.master')
@section('title','Sản Phẩm')
@section('main')
<div id="layoutSidenav_content" class="col-md-12">
    <main>
        <div class="container-fluid">
          <div class="">
                 <h1 class="mt-4">Danh Sách Sản Phẩm</h1>
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                            </div>
                            <a href="{{asset('admin/product/add')}}" class="btn btn-warning">Thêm sản phẩm mới</a>
                            <hr>
                            <div class="col-md-12 ">
                                <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                  <th >Tên Sản Phẩm</th>
                  <th>Số Lượng</th>
                  <th>Sản Phẩm Đã Bán</th>
                  <th>Giá Sản Phẩm</th>
                  <th>Ảnh Sản Phẩm</th>
                  <th>Trạng thái</th>
                  <th>Thời gian cập nhập</th>
                  <th>Danh Mục Sản Phẩm</th>
                  <th>Tùy chọn</th>    
                                            </tr>
                                        </thead>
                                        <tbody>   
                                        @foreach($productlist as $product)
                <tr>
                  <td><a style="width: 100; color: red; height: 200;" href="{{asset('admin/product/chi-tiet-san-pham/'.$product->prod_id)}}">{{$product->prod_name}}</a></td>
                  <td>{{$product->prod_quantity}}<hr> Sản Phẩm</td>
                  <td>{{$product->prod_sold}}<hr> Sản Phẩm</td>
                  <td> <h3 style="#color: red">{{number_format($product->prod_pricenew,0,',','.')}} </h3><hr> VND</td>
                  <td>
                    <img width="200px" height="180px" src="{{asset('public/anhSanPham/'.$product->prod_img)}}" class="thumbnail">
                  </td>
                      <td><span class="text-ellipsis">
                                                <?php
                                                if($product->prod_status==0){
                                                ?>
                                            <a href="{{asset('admin/product/active/'.$product->prod_id)}} " onclick="return confirm('Bạn vừa khôngcho sản phẩm hiển thị ')">Còn Hàng</span></a>

                                               <?php
                                           }else{
                                            ?>
                                            <a href="{{asset('admin/product/actived/'.$product->prod_id)}}" onclick="return confirm('Bạn vừa cho sản phẩm hiển thị  ')">Hết Hàng</a>

                                               <?php
                                           }
                                                ?>
                        </span></td>
                  <td>{{date('d/m/Y H:i',strtotime($product->created_at))}}</td>             
                  <td>{{$product->cate_name}}</td>
                  <td>
                    <a href="{{asset('admin/product/edit/'.$product->prod_id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
                    <hr>
                    <a href="{{asset('admin/product/delete/'.$product->prod_id)}}" onclick="return confirm('Bạn chắc chắn muốn xóa')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>Delete</a>
                  </td>
                </tr>
                @endforeach
                                        </tbody>                                        
                                    </table>
                                </div>
                            </div>
                            </div>
                            
            </div>
        </div>
    </main>
</div>
 <div class="sb-sidenav-menu-heading"></div>
 <hr style="width: 15%">

@stop