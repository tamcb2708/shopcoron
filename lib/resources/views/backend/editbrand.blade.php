@extends('backend.master')
@section('title','Chỉnh Sửa Thương Hiệu')
@section('main')
 
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">SỬA THƯƠNG HIỆU</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{asset('admin/')}}">Home</a></li>
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading" style="width: 100%;">
                                
                                </div>
                                <div class="panel-body">
                                  @foreach($all as $da)
                                    <form method="post" action="{{asset('admin/brand/updatebrand/'.$da->bra_id)}}">
                                        <div class="form-group">
                                            <label style="background-color: #80a4bd; width: 100%;">TÊN DANH MỤC</label>
                                            <label >Tên Thương Hiệu</label>
                                            <input required type="text"  name="name" class="form-control" placeholder="Tedanh muc..." value="{{$da->bra_name}}">
                                            <label >Ảnh Thương Hiệu</label>
                                            <input required type="file"  name="anh" class="form-control" placeholder="Tedanh muc..." value="{{$da->bra_image}}">
                                            <label >Mô Tả Thương Hiệu</label>
                                            <textarea class="ckeditor" name="mota" style="width: 100%; height: 100%" required name="description" placeholder="mo ta">{{$da->bra_desc}}</textarea>
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
                                            
                                            <input required type="submit"  name="submit" class="form-control btn btn-primary"  value="Sửa">
                                        </div>
                                         <div class="form-group">
                                            <a href="{{asset('admin/brand')}}" class="form-control btn btn-danger">Hủy Bỏ</a>
                                        </div>
                                        {{csrf_field()}}
                                    </form>
                                    @endforeach
                                </div>
                            </div>
                    </div>
                </main>
@stop
