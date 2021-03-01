@extends('backend.master')
@section('title','Chỉnh Sửa Bài Viết')
@section('main')
 
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">SỬA Bài Viết</h1>
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
                                    <form method="post" action="{{asset('admin/blog/updateblog/'.$da->bl_id)}}">
                                        <div class="form-group">
                                            <label style="background-color: #80a4bd; width: 100%;"></label>
                                            <label >Tên Bài Viết</label>
                                            <input required type="text"  name="name" class="form-control" placeholder="Tedanh muc..." value="{{$da->bl_name}}">
                                            <label >Tiêu Đề Bài Viết</label>
                                            <input required type="text"  name="title" class="form-control" placeholder="Tedanh muc..." value="{{$da->bl_name}}">
                                            <label >Ảnh Bài Viết</label>
                                            <input required type="text"  name="image" class="form-control" placeholder="Tedanh muc..." value="{{$da->bl_image}}">
                                            <label >Mô Tả Bài Viét</label>
                                            <textarea class="ckeditor" name="desc" style="width: 100%; height: 100%" required name="description" placeholder="mo ta">{{$da->bl_description}}</textarea>
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
                                            
                                            <input required type="submit"  name="submit" class="form-control btn btn-primary"  value="sua">
                                             <a style="background-color: red;" href="{{asset('admin/blog')}}" class="form-control btn btn-primary">Hủy Bỏ</a>
                                        </div>
                                         

                                        {{csrf_field()}}
                                    </form>
                                    @endforeach
                                </div>
                            </div>
                    </div>
                </main>
@stop
