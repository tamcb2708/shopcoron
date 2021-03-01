@extends('backend.master')
@section('title','Phản hồi từ khách')
@section('main')
<div class="col-md-12">
    <div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="card mb-4">
                 <h1 class="mt-4">Phản Hồi Sản Phẩm Của Khách Hàng</h1>
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Email</th>
                                                <th>Name</th>
                                                <th>Coment</th>
                                                <th>Tên Sản Phẩm</th>
                                                <th>Ảnh Sản Phẩm</th>
                                                <th>Thời gian</th>
                                              
                                               
                                            </tr>
                                        </thead>
                                        <tbody>   
                                        @foreach($list as $ls)                                     
                                            <tr>
                                                <td>{{$ls->com_email}}</td>
                                                <td>{{$ls->com_name}}</td>
                                                <td>{{$ls->com_content}}</td>
                                                <td>{{$ls->prod_name}}</td>
                                                <td>
                                                <img width="100px" src="{{asset('public/anhSanPham/'.$ls->prod_img)}}" class="thumbnail">
                                                </td>
                                                <th>{{date('d/m/Y H:i',strtotime($ls->created_at))}}</th>                                      
                                            </tr>
                                          @endforeach
                                        </tbody>                                        
                                    </table>
                                </div>
                            </div>
            </div>
        </div>
    </main>
</div>
<div id="layoutSidenav_content">
        <main>
        <div class="container-fluid">
            <div class="card mb-4">
                 <h1 class="mt-4">Phản Hồi Tin Tức Của Khách Hàng</h1>
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Email</th>
                                                <th>Name</th>
                                                <th>Coment</th>
                                                <th>Tên bài viết</th>
                                                <th>Ảnh bài viết</th>
                                                <th>Thời gian</th>
                                              
                                               
                                            </tr>
                                        </thead>
                                        <tbody>   
                                        @foreach($list1 as $ls)                                     
                                            <tr>
                                                <td>{{$ls->comm_email}}</td>
                                                <td>{{$ls->comm_name}}</td>
                                                <td>{{$ls->comm_content}}</td>
                                                <td>{{$ls->bl_name}}</td>
                                                <td>
                                                <img width="100px" src="{{asset('public/Blog/'.$ls->bl_image)}}" class="thumbnail">
                                                </td>
                                                <th>{{date('d/m/Y H:i',strtotime($ls->created_at))}}</th>                                      
                                            </tr>
                                          @endforeach
                                        </tbody>                                        
                                    </table>
                                </div>
                            </div>
            </div>
        </div>
    </main>
</div>
</div>

@stop
