@extends('backend.master')
@section('title','Thêm bài viết  ')
@section('main')

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Thêm bài viết</h1>
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
                                    <form method="post" action="{{asset('admin/blog/saveblog')}}">
                                        <div class="form-group">
                                            <label style="background-color: #80a4bd; width: 100%; padding: 15px 8px">Thêm danh mục</label>
                                            <label>Tên bài viế</label>
                                            <input required type="text"  name="name" class="form-control" placeholder="Ten danh muc...">
                                            <label>Tiêu đề</label>
                                             <input required type="text"  name="title" class="form-control" placeholder="Ten danh muc...">
                                             <label>Ảnh</label>
                                             <input required type="file"  name="image" class="form-control" placeholder="
                                            Anh danh muc ...">
                                            <label>Mô Tả</label>
                                             <textarea class="ckeditor" name="desc" style="width: 100%; height: 100%" required name="description" placeholder="mo ta"></textarea>
                                            <script type="text/javascript">
                                                var editor = CKEDITOR.replace('description',{language:'vi',
                                                filebrowserImageBrowseUrl:'../editor/ckefintor/ckefintor/ckefintor.html?Type=Image',
                                                filebrowserFlashBrowseUrl:'../editor/ckefintor/ckefintor/ckefintor.html?Type=Flash',
                                                filebrowserImageUploadUrl:'../editor/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                                 filebrowserFlashUploadUrl:'../editor/public/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                            });
                                            </script>
                                             <label >Chọn Trạng thái</label>
                                            <select name="status" class="form-control input-sm m-bot15" >
                                                <option value="0">Ẩn Bài Viết</option>
                                                <option value="1">Hiển Thị Bài Viết</option>
                                            </select>
                                        </div>
                                         <div class="form-group">
                                            
                                            <input required type="submit"  name="addbrand" class="form-control btn btn-primary"  value="thêm mới">
                                             <a style="background-color: red;" href="{{asset('admin/blog')}}" class="form-control btn btn-primary">Hủy Bỏ</a>
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