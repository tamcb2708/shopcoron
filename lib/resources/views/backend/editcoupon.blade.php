@extends('backend.master')
@section('title','Chỉnh Sửa Mã Giảm Giá')
@section('main')
 
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">SỬA MÃ GIẢM GIÁ</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{asset('admin/')}}">Trang Chủ</a></li>
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading" style="width: 100%;">
                                
                                </div>
                                <div class="panel-body">
                                  @foreach($all as $da)
                                    <form method="post" action="{{asset('admin/coupon/updatecoupon/'.$da->con_id)}}">
                                        <div class="form-group">
                                         
                                            <label style="background-color: #80a4bd; width: 100%; padding: 15px 8px"></label>
                                            <input required type="text" value="{{$da->con_name}}" name="name" class="form-control" placeholder="Ten ma giam gia">
                                             <input required type="text"  name="code" value="{{$da->con_code}}" class="form-control" placeholder="
                                            ma giam gia">
                                               <input min="1" max="100" name="number" value="{{$da->con_number}}" type="number"  class="cart_quantity">
                                             <select class="form-control"  name="condition">
                                             	<option value="0">{{$da->con_condition}}</option>
                                             	<option value="1">Giảm Theo Phần Trăm</option>
                                             	<option value="2">Giảm Theo Giá Tiền</option>
                                             	<option value="3"></option>
                                             </select>
                                              <input required type="text"  name="time" value="{{$da->con_time}}" class="form-control" placeholder="
                                            nhap so phan tram hoac so tien giam">
                                     
                                        </div>
                                         <div class="form-group">
                                            
                                            <input required type="submit"  name="submit" class="form-control btn btn-primary"  value="sua">
                                        </div>
                                         <div class="form-group">
                                            <a href="{{asset('admin/coupon')}}" class="form-control btn btn-danger">Hủy Bỏ</a>
                                        </div>
                                        {{csrf_field()}}
                                    </form>
                                    @endforeach
                                </div>
                            </div>
                    </div>
                </main>
@stop
