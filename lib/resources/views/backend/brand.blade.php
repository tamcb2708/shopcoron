@extends('backend.master')
@section('title','Danh mục thương hiệu sản phẩm ')
@section('main')

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Danh Mục Thương Hiệu Sản Phẩm</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{asset('/admin')}}">Trang Chủ</a></li>
                            
                        </ol>
                         <a href="{{asset('admin/brand/add-brand')}}" class="btn btn-primary">Thêm Thương Hiệu</a>


                        <div class="card mb-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading" style="width: 100%;">
                                   
                                </div>
                                <div class="panel-body">
                                    @include('errors.note')

                                </div>
                            </div>

                            <div class="card-body">
                              <h3>      <?php
                        $message=Session::get('message');
                        if($message){
                            echo '<span class="text-alert">'.$message. '</span>' ;
                            Session::put('message',null);
                        }
                        ?></h3>
                                <div >
                                    <table class="table table-bordered" style="padding: 300px width: 50%; height: 100%;">
                                        <thead>
                                             <tr class="bg-primary">
                                            <th>Tên Danh Mục</th>
                                            <th>Hình Ảnh</th>
                                            <th>Mô Tả</th>
                                            <th>Trạng Thái</th>
                                            <th>Thời gian thêm danh mục</th>
                                            <th style="width: 30%;" >Tùy Chọn</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($all as $da)
                                            <tr>
                                            <td>{{$da->bra_name}} </td>
                                            <td><img width="50px" src="{{asset('public/Brand/'.$da->bra_image)}}" class="thumbnail">
                                            </td>
                                            <td><p>{!!$da->bra_desc!!}</p></td>
                                            <td><span class="text-ellipsis">
                                                <?php
                                                if($da->bra_status==0){
                                                ?>
                                            <a href="{{asset('admin/brand/active/'.$da->bra_id)}} " onclick="return confirm('Bạn đã không để hiển thị thương hiệu ')"><span class="fa fa-thumbs-up"></span></a>

                                               <?php
                                           }else{
                                            ?>
                                            <a href="{{asset('admin/brand/actived/'.$da->bra_id)}}" onclick="return confirm('Bạn đã để hiển thị thương hiệu  ')"><span class="fa fa-thumbs-down"></span></a>

                                               <?php
                                           }
                                                ?>
                                            </span></td>
                                            <td>{{date('d/m/Y H:i',strtotime($da->created_at))}}</td>
                                            <td>
                                                <a href="{{asset('admin/brand/edit/'.$da->bra_id)}}" class="btn btn-warning">
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                    Edit
                                                </a>
                                                <a href="{{asset('admin/brand/delete/'.$da->bra_id)}}" onclick="return confirm('Bạn chắc chắn muốn xóa  ?')" class="btn btn-danger"> <span class="glyphicon glyphicon-edit"></span>Delete</a>
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