@extends('backend.master')
@section('title','Danh Sách Đơn Hàng ')
@section('main')

       <h3>      <?php
                        $message=Session::get('message');
                        if($message){
                            echo '<span class="text-alert">'.$message. '</span>' ;
                            Session::put('message',null);
                        }
                        ?></h3>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
          <div>
                 <h1 class="mt-4">Danh Sách Đơn Hàng</h1>
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                            </div>
                            
                            <hr>
                            <div class="col-md-12 ">
                                <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
          <th>thứ tự</th>
                                            <th>mã đơn hàng</th>
                                            <th>tình trạng đơn hàng</th>
                                            <th>thời gian</th>
                                            <th style="width: 30%;" >tùy chọn</th>
                                            </tr>
                                        </thead>
                                        <tbody>   
                     @php
                                               $i = 0;
                                            @endphp
                                           @foreach( $order as $key => $or )
                                           @php
                                               $i++;
                                            @endphp
                                            <tr>
                                            <td>{{$i}} </td>
                                            <td>TTKTG{{$or->order_id}}{{$or->order_code}}</td>
                                            <td>
                                                @if($or->order_status==1)
                                                    <p style="background-color: #e6dc83">Đơn Hàng Mới</p>
                                                @else
                                                    <p style="background-color: #807d6a">Đơn Hàng Đã Xử Lý</p>
                                                @endif
                                            </td>
                                            <td>{{date('d/m/Y H:i',strtotime($or->created_at))}}</td>
                                            <td>
                                                <a href="{{asset('admin/order/view-order/'.$or->order_code)}}" class="btn btn-warning">
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                    View Detail
                                                </a>
                                                @if($or->order_status==2)
                                                <a href="{{asset('admin/order/delete/'.$or->order_code)}}" onclick="return confirm('Bạn chắc chắn muốn xóa  ?')" class="btn btn-danger"> <span class="glyphicon glyphicon-edit"></span>Delete</a>
                                                @endif
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