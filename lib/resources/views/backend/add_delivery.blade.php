@extends('backend.master')
@section('title',' Tính Phí Vận Chuyển ')
@section('main')

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Thêm Phí Vận Chuyển</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{asset('/admin')}}">Trang Chủ</a></li>
                            
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
                                    <form>
                                       
                                            <label >Chọn Thành Phố</label>
                                            <select name="city" id="city" class="form-control input-sm m-bot15 choose city" >
                                                <option value=""><<----Chọn Thành Phố---->>></option>
                                                    @foreach($city as $ci)
                                                    <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                                    @endforeach
                                               
                                           </select>
                                            <label >Chọn Quận Huyện</label>
                                            <select name="province" id="province" class="form-control input-sm m-bot15 province choose" >
                                                <option value=""><<----Chọn Quận Huyện---->>></option>
                                        
                                            </select>
                                            <label >Chọn Xã Phường</label>
                                            <select name="wards" id="wards" class="form-control input-sm m-bot15  wards" >
                                                <option value=""><<----Chọn xã Phường---->>></option>
                                            </select>
                                        </div>
                                         <div class="form-group">
                                            <label class="btn btn-primary">Thêm Phí</label>
                                            <input  type="text"  name="fre_ship" class="form-control fre_ship" placeholder="Mời Nhập Phí...">
                                            
                                            <button type="button" name="add_delivery" class="btn btn-info add_delivery">Thêm</button>
                                        </div>
                                        {{csrf_field()}}
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div style="height: 100px"></div>
                       
                </main>
                  <div id="load_delivery">
               
           </div>
           </div>
         

@stop