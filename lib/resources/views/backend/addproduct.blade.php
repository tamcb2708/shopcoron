@extends('backend.master')
@section('title','Them San Pham')
@section('main')
<div id="layoutSidenav_content" class="row">
                <main>
                    <div class="container">
                        <h1 class="mt-4">Thêm Sản Phẩm</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{asset('admin/home')}}">Trang Chủ</a></li>
                            <li class="breadcrumb-item active">Thêm Sản Phẩm</li>
                        </ol>

                        <a class="btn btn-primary" href="{{asset('admin/product')}}">Quay về trang Sản Phẩm</a>

                        <div class="card mb-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading" style="width: 100%;">
                                   
                                </div>
                                <div class="panel-body" style="background-color: #c5d0de">
                                    @include('errors.note')
                                    <form  action="" method="post" role="form" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="hidden" name="sold" value="0">
                                            <label >Tên Sản Phẩm</label>
                                            <input required type="text"  name="name" class="form-control" value="......">
                                        </div>
                                        <div class="form-group">
                                            <label >Số Lượng</label>
                                            <input required type="number"  name="quantity" min="1" class="form-control" value="1">
                                        </div>
                                        <div class="form-group">
                                            <label>Ảnh</label>
                                            <input required id="img" type="file"  name="img"  onchange="changeImg(this)">
                                            <img  id="anhSanPham" class="thubnail" width="50%;" height="50%;" alt="yourImage" src="https://studios.vn/wp-content/uploads/2015/11/anh-thoi-trang-trong-studio-3.jpg">
                                        </div>      
                                        <div class="form-group">
                                            <label>Giá tiền cũ</label>
                                            <input required type="text"  name="price" class="form-control" value=".............">
                                        </div>
                                        <div class="form-group">
                                            <label>Giá Tiền mới</label>
                                            <input required type="text"  name="pricenew" class="form-control" value="..............">
                                        </div>
                                         <div class="form-group">
                                            <label>Style</label>
                                            <input required type="text"  name="sty" class="form-control" value="..............">
                                        </div>
                                         <div class="form-group">
                                            <label>Nhà Sáng Chế</label>
                                            <input required type="text"  name="comp" class="form-control" value="..............">
                                        </div>
                                         <div class="form-group">
                                            <label>Kiểu Dáng</label>
                                            <input required type="text"  name="prop" class="form-control" value="..............">
                                        </div>
                                        <div class="form-group">
                                            <label>Trạng thái sản phẩm</label>
                                            <select required name="status"  class="form-control">
                                                <option value="0">Còn Hàng</option>
                                                <option value="1">Hết Hàng</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label >Miêu Tả</label>
                                            <textarea class="ckeditor" style="width: 100%; height: 100%" required name="description"></textarea>
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
                                            <label >Chi Tiết Miêu Tả</label>
                                            <textarea class="ckeditor" style="width: 100%; height: 100%" required name="more"></textarea>
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
                                            <label>Danh Mục Sản Phẩm</label>
                                            <select required name="cate" class="form-control">
                                                @foreach($catelist as $cate)
                                                <option value="{{$cate->cate_id}}">{{$cate->cate_name}}</option>
                                               
                                                @endforeach

                                            </select>
                                        </div>
                                         <div class="form-group">
                                            
                                            <input required type="submit"  name="submit" class="form-control btn btn-primary" placeholder="Ten danh muc..." value="Thêm ">
                                            <a style="background-color: red;" href="{{asset('admin/product')}}" class="form-control btn btn-primary">Hủy Bỏ</a>
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