@extends('backend.master')
@section('title','Danh mục sản phẩm ')
@section('main')

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">DANH MỤC SẢN PHẨM</h1>

                        <div class="card mb-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading" style="width: 100%;">
                                   
                                </div>
                                <div class="panel-body">
                                    @include('errors.note')
                                    <form method="post">
                                        <div class="form-group">
                                            <label style="background-color: #80a4bd; width: 100%; padding: 15px 8px">Thêm danh mục  =======>   </label>
                                            <input required type="text"  name="name" class="form-control" placeholder="Đánh Tên Danh Mục...">
                                            <table >Chọn Danh Mục Cha</table>
                                             <select name="parent" class="form-control input-sm m-bot15">
                                            @foreach($cate as $ca)
                                            <option value="0">Không Có Danh Mục Cha</option>
                                            <option value="{{$ca->cate_id}}">{{$ca->cate_name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                         <div class="form-group">
                                            
                                            <input required type="submit"  name="submit" class="form-control btn btn-primary" placeholder="Ten danh muc..." value="thêm mới">
                                        </div>
                                        {{csrf_field()}}
                                    </form>
                                </div>
                            </div>

                            <div class="card-body">
                                <div >
                                    <table class="table table-bordered" style="padding: 300px width: 50%; height: 100%;">
                                        <thead>
                                             <tr class="bg-primary">
                                            <th>Tên Danh Mục</th>
                                            <th>Thời gian thêm danh mục</th>
                                            <th style="width: 30%;" >Tùy Chọn</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($catelist as $cate)
                                            <tr>
                                            <td>{{$cate->cate_name}} </td>
                                            <td>{{date('d/m/Y H:i',strtotime($cate->created_at))}}</td>
                                            <td>
                                                <a href="{{asset('admin/category/edit/'.$cate->cate_id)}}" class="btn btn-warning">
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                    Edit
                                                </a>
                                                <a href="{{asset('admin/category/delete/'.$cate->cate_id)}}" onclick="return confirm('Bạn chắc chắn muốn xóa  ?')" class="btn btn-danger"> <span class="glyphicon glyphicon-edit"></span>Delete</a>
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