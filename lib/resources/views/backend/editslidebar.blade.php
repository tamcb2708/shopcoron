@extends('backend.master')
@section('title','Chỉnh Sửa SLIDERBAR')
@section('main')
 
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">SỬA SLIDEBAR</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">SỬA SLIDE</a></li>
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading" style="width: 100%;">
                                
                                </div>
                                <div class="panel-body">
                                  @foreach($all as $da)
                                    <form method="post" action="{{asset('admin/slidebar/updateslide/'.$da->sli_id)}}">
                                        <div class="form-group">
                                            <label style="background-color: #80a4bd; width: 100%;">TÊN DANH MỤC</label>
                                            <label class="btn btn-primary">Ten thuong hieu</label>
                                            <input required type="text"  name="name" class="form-control" placeholder="Tedanh muc..." value="{{$da->sli_name}}">
                                            <label class="btn btn-primary">Anh thuong hieu</label>
                                            <input required type="text"  name="image" class="form-control" placeholder="Tedanh muc..." value="{{$da->sli_image}}">
                                            <label class="btn btn-primary">mo ta thuong hieu</label>
                                            <textarea class="ckeditor" name="desc" style="width: 100%; height: 100%" required name="description" placeholder="mo ta">{{$da->sli_des}}</textarea>
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
                                        </div>
                                         <div class="form-group">
                                            <a href="{{asset('admin/slidebar')}}" class="form-control btn btn-danger">huy bo</a>
                                        </div>
                                        {{csrf_field()}}
                                    </form>
                                    @endforeach
                                </div>
                            </div>
                    </div>
                </main>
@stop
