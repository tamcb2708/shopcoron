@extends('backend.master')
@section('title','Chỉnh Sửa Danh Mục')
@section('main')
 
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">SỬA DANH MỤC</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">SỬA DANH MỤC</a></li>
                            <li class="breadcrumb-item active">{{$cate->cate_name}}</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading" style="width: 100%;">
                                
                                </div>
                                <div class="panel-body">
                                  @include('errors.note')
                                    <form method="post">
                                        <div class="form-group">
                                            <label style="background-color: #80a4bd; width: 100%;">TÊN DANH MỤC</label>
                                            <input required type="text"  name="name" class="form-control" placeholder="Tedanh muc..." value="{{$cate->cate_name}}">
                                        </div>
                                         <div class="form-group">
                                            
                                            <input required type="submit"  name="submit" class="form-control btn btn-primary" placeholder="Ten danh muc..." value="sua">
                                        </div>
                                         <div class="form-group">
                                            
                                            <a href="{{asset('admin/category')}}" class="form-control btn btn-danger">huy bo</a>
                                        </div>
                                        {{csrf_field()}}
                                    </form>
                                </div>
                            </div>
                    </div>
                </main>
@stop
