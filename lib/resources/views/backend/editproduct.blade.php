@extends('backend.master')
@section('title','sua San Pham')
@section('main')
<div id="layoutSidenav_content" class="row">
                <main>
                    <div class="container">
                        <h1 class="mt-4">Them San Pham</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Them San Pham</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading" style="width: 100%;">
                                   
                                </div>
                                <div class="panel-body">
                                    @include('errors.note')
                                    <form  action="" method="post" role="form" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Ten san pham</label>
                                            <input required type="text"  name="name" class="form-control" value="{{$product->prod_name}}">
                                        </div>
                                        <div class="form-group">
                                            <label>so luong san pham</label>
                                            <input required type="number" min="1"  name="quantity" class="form-control" value="{{$product->prod_quantity}}">
                                        </div>
                                        <div class="form-group">
                                            <label>anh</label>
                                            <input required id="img" type="file"   name="img" class="form-control hidden" onchange="changeImg(this)">
                                            <img  id="anhSanPham" class="thubnail" width="50%;" height="50%;"  src="{{asset('public/anhSanPham/'.$product->prod_img)}}">
                                        </div>

                                        
                                        
                                        <div class="form-group">
                                            <label>kich co</label>
                                            <select required name="size" class="form-control">
                                                <option value="1" @if($product->prod_size==1) selected @endif>size M</option>
                                                <option value="2"  @if($product->prod_size==2) selected @endif>size L</option>
                                                <option value="3"  @if($product->prod_size==3) selected @endif>size S</option>
                                                <option value="4"  @if($product->prod_size==4) selected @endif>size X</option>
                                                <option value="5"  @if($product->prod_size==5) selected @endif>size XL</option>
                                                <option value="6"  @if($product->prod_size==6) selected @endif>size XXL</option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>gia tien cu</label>
                                            <input required type="text"  name="price" class="form-control" value="{{$product->prod_price}}">
                                        </div>
                                        <div class="form-group">
                                            <label>gia tien moi</label>
                                            <input required type="text"  name="pricenew" class="form-control" value="{{$product->prod_pricenew}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Trang thai</label>
                                            <select required name="status" class="form-control">
                                                <option value="1"
                                                    @if($product->prod_stats==1) checked @endif

                                                    >Con hang</option>
                                                <option value="2"  @if($product->prod_stats==2) checked @endif>Het hang</option>
                                                <option value="3"  @if($product->prod_stats==3) checked @endif>Hang vua ve</option>


                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label >mieu ta</label>
                                            <textarea  class="ckeditor" style="width: 100%; height: 100%" required name="description">{{$product->prod_descripton}}</textarea>

                                            <script type="text/javascript">
                                                var editor = CKEDITOR.replace('description',{language:'vi',
                                                filebrowserImageBrowseUrl:'../editor/ckefintor/ckefintor/ckefintor.html?Type=Image',
                                                filebrowserFlashBrowseUrl:'../editor/ckefintor/ckefintor/ckefintor.html?Type=Flash',
                                                filebrowserImageUploadUrl:'../editor/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                                 filebrowserFlashUploadUrl:'../editor/public/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                            });
                                            </script>
                                        </div>
                                        <div class="form-group">
                                            <label>Danh Muc</label>
                                            <select required name="cate" class="form-control">
                                                @foreach($listcate as $cate)
                                                <option value="{{$cate->cate_id}}"
                                                @if($product->prod_cate == $cate->cate_id) selected @endif    >{{$cate->cate_name}}</option>
                                               
                                                @endforeach

                                            </select>
                                        </div>
                                         <div class="form-group">
                                            
                                            <input required type="submit"  name="submit" class="form-control btn btn-primary" placeholder="Ten danh muc..." value="sua ">
                                            <a href="{{asset('/admin/product')}}" class="btn btn-danger">huy bo</a>
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