@extends('backend.master')
@section('title','Danh Mục Quảng Cáo  ')
@section('main')

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Danh Mục Quảng Cáo</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{asset('/admin')}}}">Trang Chủ</a></li>
                            
                        </ol>
                         <a href="{{asset('admin/slidebar/add-slidebar')}}" class="btn btn-primary">Thêm Quảng Cáo Trong Trang Chủ</a>


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
                                            <th>Tên </th>
                                            <th>Hình Ảnh</th>
                                            <th>Mô Tả</th>
                                            <th>Trạng Thái</th>
                                            <th>Thời gian</th>
                                            <th style="width: 30%;" >Tùy Chọn</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($all as $da)
                                            <tr>
                                            <td>{{$da->sli_name}} </td>
                                            <td><img width="300px" src="{{asset('public/Slidebar/'.$da->sli_image)}}" class="thumbnail">
                                            </td>
                                            <td>{!!$da->sli_des!!}</td>
                                            <td><span class="text-ellipsis">
                                                <?php
                                                if($da->sli_status==0){
                                                ?>
                                            <a href="{{asset('admin/slidebar/active/'.$da->sli_id)}}"><span class="fa fa-thumbs-up"></span></a>

                                               <?php
                                           }else{
                                            ?>
                                            <a href="{{asset('admin/slidebar/actived/'.$da->sli_id)}}"><span class="fa fa-thumbs-down"></span></a>

                                               <?php
                                           }
                                                ?>
                                            </span></td>
                                            <td>{{date('d/m/Y H:i',strtotime($da->created_at))}}</td>
                                            <td>
                                                <a href="{{asset('admin/slidebar/edit/'.$da->sli_id)}}" class="btn btn-warning">
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                    Edit
                                                </a>
                                                <a href="{{asset('admin/slidebar/delete/'.$da->sli_id)}}" onclick="return confirm('Bạn chắc chắn muốn xóa  ?')" class="btn btn-danger"> <span class="glyphicon glyphicon-edit"></span>Delete</a>
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