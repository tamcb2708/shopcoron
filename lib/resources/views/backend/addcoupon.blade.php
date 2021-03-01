@extends('backend.master')
@section('title','Thêm Mã Giảm Giá ')
@section('main')

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Thêm Mã Giảm Giá</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{asset('admin/')}}">Trang Chủ</a></li>
                            
                        </ol>
                        <?php
                        $message=Session::get('message');
                        if($message){
                            echo '<span class="text-alert">'.$message. '</span>' ;
                            Session::put('message',null);
                        }
                        ?>

                        <div class="card mb-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading" style="width: 100%;">
                                   
                                </div>
                                <div class="panel-body">
                                    @include('errors.note')
                                    <form method="post" action="{{asset('admin/coupon/savecoupon')}}">
                                        <div class="form-group">
                                            <label style="background-color: #80a4bd; width: 100%; padding: 15px 8px">Thêm danh mục</label>
                                            <input required type="text"  name="name" class="form-control" placeholder="Ten ma giam gia">
                                             <input required type="text"  name="code" class="form-control" placeholder="
                                            ma giam gia">
                                               <input min="1" max="100" name="number" value="" type="number"  class="cart_quantity">
                                             <select class="form-control" name="condition">
                                             	<option value="0">----chon----</option>
                                             	<option value="1">Giảm Theo Phần Trăm</option>
                                             	<option value="2">Giảm Theo Giá Tiên</option>
                                             </select>
                                              <input required type="text"  name="time" class="form-control" placeholder="
                                            nhap so phan tram hoac so tien giam">
                                        </div>
                                         <div class="form-group">
                                            
                                            <input required type="submit"  name="addbrand" class="form-control btn btn-primary"  value="thêm mới">
                                             <a style="background-color: red;" href="{{asset('admin/coupon')}}" class="form-control btn btn-primary">Hủy Bỏ</a>
                                        </div>
                                        {{csrf_field()}}
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div style="height: 100px"></div>
                       
                </main>
           </div>

@stop