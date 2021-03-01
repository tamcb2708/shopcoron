@extends('backend.master')
@section('title','Danh Mục Bài Viết ')
@section('main')

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Danh Mục Bài Viết</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{asset('admin/')}}">Trang Chủ</a></li>
                            
                        </ol>
                         <a href="{{asset('admin/blog/add-blog')}}" class="btn btn-primary">Thêm Bài Viết</a>


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
                                    <table class="table table-bordered" >
                                        <thead>
                                             <tr class="bg-primary">
                                            <th>Tên Bài Viết</th>
                                            <th>Khái Quát</th>
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
                                            <td>{{$da->bl_name}} </td>
                                            <td>{{$da->bl_metatitle}}</td>
                                            <td><img width="200px" src="{{asset('public/Blog/'.$da->bl_image)}}" class="thumbnail">
                                            </td>
                                            <td><p>{!!$da->bl_description!!}</p></td>
                                            <td><span class="text-ellipsis">
                                                <?php
                                                if($da->bt_status==0){
                                                ?>
                                            <a href="{{asset('admin/blog/active/'.$da->bl_id)}} " onclick="return confirm('Bạn da de khong hien thi thanh cong ')"><span class="fa fa-thumbs-down"></span></a>;

                                               <?php
                                           }else{
                                            ?>
                                            <a href="{{asset('admin/blog/actived/'.$da->bl_id)}}" onclick="return confirm('Bạn da de hien thi thanh cong  ')"><span class="fa fa-thumbs-up"></span></a>

                                               <?php
                                           }
                                                ?>
                                            </span></td>
                                            <td>{{date('d/m/Y H:i',strtotime($da->created_at))}}</td>
                                            <td>
                                                <a href="{{asset('admin/blog/edit/'.$da->bl_id)}}" class="btn btn-warning">
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                    Edit
                                                </a>
                                                <a href="{{asset('admin/blog/delete/'.$da->bl_id)}}" onclick="return confirm('Bạn chắc chắn muốn xóa  ?')" class="btn btn-danger"> <span class="glyphicon glyphicon-edit"></span>Delete</a>
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