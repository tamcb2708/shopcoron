@extends('backend.master')
@section('title','Danh Sách Mã Giảm Giá ')
@section('main')

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Danh Sách Mã Giảm Giá</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{asset('/admin')}}">Trang Chủ</a></li>
                            
                        </ol>
                         <a href="{{asset('admin/coupon/add-coupon')}}" class="btn btn-primary">Thêm Mã Giảm Giá</a>


                        <div class="card mb-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading" style="width: 100%;">
                                   
                                </div>
                                <div class="panel-body">
                                    @include('errors.note')

                                </div>
                            </div>

                            <div class="card-body">
                                    <?php
                        $message=Session::get('message');
                        if($message){
                            echo '<span class="text-alert">'.$message. '</span>' ;
                            Session::put('message',null);
                        }
                        ?>
                                <div >
                                    <table class="table table-bordered" style="padding: 300px width: 50%; height: 100%;">
                                        <thead>
                                             <tr class="bg-primary">
                                            <th>Tên Mã Giảm</th>
                                            <th>MÃ</th>
                                            <th>Số Lượng</th>
                                            <th>Hình Thức</th>
                                            <th>Số Tiền Giảm Or Phần Trăm</th>
                                            <th>Thời Gian</th>
                                            <th style="width: 30%;" >Tùy Chọn</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($all as $da)
                                            <tr>
                                            <td>{{$da->con_name}} </td>
                                            <td>{{$da->con_code}}
                                            </td>
                                            <td>{{$da->con_number}}</td>
                                             <td>
                                                 @if($da->con_condition==1)
                                                  Giảm Giá Theo Phần Trăm
                                                  @elseif($da->con_condition==2)
                                                  Giảm Giá Theo Giá Tiền
                                                  @elseif($da->con_condition==0)
                                                  Chưa có Hình Thức Giảm Giá
                                                  @endif
                                             </td>
                                             <td>{{$da->con_time}}</td>
                                            <td>{{date('d/m/Y H:i',strtotime($da->created_at))}}</td>
                                            <td>
                                                <a href="{{asset('admin/coupon/edit/'.$da->con_id)}}" class="btn btn-warning">
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                    Edit
                                                </a>
                                                <a href="{{asset('admin/coupon/delete/'.$da->con_id)}}" onclick="return confirm('Bạn chắc chắn muốn xóa  ?')" class="btn btn-danger"> <span class="glyphicon glyphicon-edit"></span>Delete</a>
                                            </td>
                                            </tr>
                                          @endforeach
                                        </tbody>                                     
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div style="height: 100px"></div>
                       
                </main>
           </div>

@stop