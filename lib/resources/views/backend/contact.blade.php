@extends('backend.master')
@section('title','Liên Hệ Đến shop Coron')
@section('main')

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Thông Tin Liên Hệ</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{asset('/admin')}}">Trang Chủ</a></li>
                            
                        </ol>
                 


                        <div class="card mb-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading" style="width: 100%;">
                                   
                                </div>
                                <div class="panel-body">
                                    @include('errors.note')

                                </div>
                            </div>

                            <div class="card-body">
                       
                                <div >
                                    <table class="table table-bordered" style="padding: 300px width: 50%; height: 100%;">
                                        <thead>
                                             <tr class="bg-primary">
                                            <th>Tên Khách Hàng</th>
                                            <th>Địa Chỉ Email</th>
                                            <th>Chi Tiết Liên Hệ</th>
                                            <th>Điện Thoại</th>
                                            <th>Thông Tin Liên Hệ</th>
                                            <th>Thời Gian Gửi</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($contact as $da)
                                            <tr>
                                            <td>{{$da->ct_name}} </td>
                                            <td>{{$da->ct_email}}
                                            </td>
                                            <td>{{$da->ct_subject}}</td>
                                           <td>{{$da->ct_phone}}</td>
                                           <td>{{$da->ct_mes}}</td>
                                           <td>{{$da->created_at}}</td>
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