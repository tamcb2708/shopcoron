@extends('backend.master')8
@section('title','Them Danh Muc  ')
@section('main')

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">THEM SLIDERBAR TRANG CORRON</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{asset('admin/slidebar')}}">Danh mục</a></li>
                            
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
                                    <form method="post" action="{{asset('admin/slidebar/saveslide')}}">
                                        <div class="form-group">
                                            <label style="background-color: #80a4bd; width: 100%; padding: 15px 8px">Thêm Quảng Cáo</label>
                                            <input required type="text"  name="name" class="form-control" placeholder="Tên Quảng Cáo...">
                                             <input required type="file"  name="image" class="form-control" placeholder="
                                            Ảnh Quảng Cáo ...">
                                             <textarea class="ckeditor" name="desc" style="width: 100%; height: 100%" required name="description" placeholder="Mô tả"></textarea>
                                            <script type="text/javascript">
                                                var editor = CKEDITOR.replace('description',{language:'vi',
                                                filebrowserImageBrowseUrl:'../editor/ckefintor/ckefintor/ckefintor.html?Type=Image',
                                                filebrowserFlashBrowseUrl:'../editor/ckefintor/ckefintor/ckefintor.html?Type=Flash',
                                                filebrowserImageUploadUrl:'../editor/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                                 filebrowserFlashUploadUrl:'../editor/public/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                            });
                                            </script>
                                             <label class="btn btn-primary">Hien thi</label>
                                            <select name="status" class="form-control input-sm m-bot15" >
                                                <option value="0">Ẩn Quảng Cáo</option>
                                                <option value="1">Hiện Quảng Cáo</option>
                                            </select>
                                        </div>
                                         <div class="form-group">
                                            
                                            <input required type="submit"  name="addslide" class="form-control btn btn-primary"  value="thêm mới">
                                            <a style="background-color: red;" href="{{asset('admin/slidebar')}}" class="form-control btn btn-primary">Hủy Bỏ</a>
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