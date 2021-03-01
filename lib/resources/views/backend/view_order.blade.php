@extends('backend.master')
@section('title','chi tiết đơn hàng ')
@section('main')

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">chi tiết đơn hàng</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{asset('/admin/')}}">Trang Chủ</a></li>
                            
                        </ol>
                        <div class="card mb-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading" style="width: 100%;">
                                   
                                </div>
                                <div class="panel-body">
                                    @include('errors.note')

                                </div>
                            </div>

                            <div class="card-body">
                              <h3>      <?php
                        $message=Session::get('message');
                        if($message){
                            echo '<span class="text-alert">'.$message. '</span>' ;
                            Session::put('message',null);
                        }
                        ?></h3>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
          <div>
                 <h1 class="mt-4">Danh Sách Đơn Hàng</h1>
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                            </div>
                            
                            <hr>
                            <div class="col-md-12 ">
                                <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
          <th>thứ tự</th>
                                            <th>mã đơn hàng</th>
                                            <th>tình trạng đơn hàng</th>
                                            <th>thời gian</th>
                                            <th style="width: 30%;" >tùy chọn</th>
                                            </tr>
                                        </thead>
                                        <tbody>   
                     @php
                                               $i = 0;
                                            @endphp
                                           @foreach( $ord as $key => $or )
                                           @php
                                               $i++;
                                            @endphp
                                            <tr>
                                            <td>{{$i}} </td>
                                            <td>TTKTG{{$or->order_id}}{{$or->order_code}}</td>
                                                <td>
                                                @if($or->order_status==1)
                                                    <p style="background-color: #e6dc83">Đơn Hàng Mới</p>
                                                @else
                                                    <p style="background-color: #807d6a">Đơn Hàng Đã Xử Lý</p>
                                                @endif
                                            </td>
                                            <td>{{date('d/m/Y H:i',strtotime($or->created_at))}}</td>
                                            <td>
                                                <a href="{{asset('admin/order/view-order/'.$or->order_code)}}" class="btn btn-warning">
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                    View Detail
                                                </a>
                                                @if($or->order_status==2)
                                                <a href="{{asset('admin/order/delete/'.$or->order_code)}}" onclick="return confirm('Bạn chắc chắn muốn xóa  ?')" class="btn btn-danger"> <span class="glyphicon glyphicon-edit"></span>Delete</a>
                                                @endif
                                            </td>
                                            </tr>
                                          @endforeach
                                        </tbody>                                        
                                    </table>
                                </div>
                            </div>
                            </div>
                            
            </div>
        </div>
    </main>
</div>
 <div class="sb-sidenav-menu-heading"></div>
 <hr style="width: 15%">
                                <hr>
                                <div  >
                                    <h4>Thông Tin Tài Khoản Khách</h4>
                                    <table class="table table-bordered" style="padding: 300px width: 50%; height: 100%;">
                                        <thead>
                                             <tr class="bg-primary">
                                            <th>Họ Và Tên</th>
                                            <th>Email</th>
                                            <th>Địa Chỉ</th>
                                            <th>Số Điện Thoại</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <tr>
                                                <td style="color: red">{{$customer->cus_name}}</td>
                                                <td>{{$customer->cus_email}}</td>
                                                <td>{{$customer->cus_address}}</td>
                                                <td>{{$customer->cus_phone}}</td>
                                            </tr>
                                        </tbody>                                     
                                    </table>
                                </div>
                                <hr>
                                <div  >
                                    <h4>Thông tin Vận Chuyển</h4>
                                    <table class="table table-bordered" style="padding: 300px width: 50%; height: 100%;">
                                        <thead>
                                             <tr class="bg-primary">
                                            <th>Tên Người Nhận</th>
                                            <th>Địa Chỉ Người Nhận</th>
                                            <th>Số Điện Thoại</th>
                                            <th>email người nhận</th>
                                            <th>ghi chú</th>
                                            <th>Phương Thức</th>
                                            <th>Ngày Ship</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <tr>
                                                <td style="color: red">{{$shipping->ship_name}}</td>
                                                <td style="color: blue">{{$shipping->ship_address}}</td>
                                                <td>{{$shipping->ship_phone}}</td>
                                                <td>{{$shipping->ship_email}}</td>
                                                <td>{{$shipping->ship_note}}</td>
                                                <td>
                                                    @if($shipping->ship_paymment==0)
                                                Nhận Hàng Rồi Thanh Toán
                                                 @else
                                                Thanh Toán Chuyển Khoản
                                              @endif
                                          </td>
                                                <td>{{$shipping->created_at}}</td>
                                            </tr>
                                        </tbody>                                     
                                    </table>
                                </div>
                                <hr>
                                 <div  >
                                    <h4>Danh Sách Sản Phẩm Khách Đặt</h4>
                                    <table class="table table-bordered" style="padding: 300px width: 50%; height: 100%;">
                                        <thead>
                                             <tr class="bg-primary">
                                            <th>Số Thứ Tự</th>
                                            <th>Mã Sản Phẩm</th>
                                            <th>Mã giảm giá</th>
                                            <th>Ảnh Sản Phẩm</th>
                                            <th>Tên Sản Phẩm</th>
                                            <th>Kích Cỡ</th>
                                            <th>Màu Sắc</th>
                                            <th>Giá Tiền</th>
                                            <th>Số Lượng Trong Kho</th>
                                            <th>Số Lượng Đặt</th>
                                            <th>Tổng tiền sản phẩm</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                             @php
                                                $i = 0;
                                                $total = 0;
                                                
                                            @endphp
                                        @foreach($order_details as $key =>$order)
                                            @php
                                                $i++ ;
                                                $tongtien=$order->product_price * $order->product_quantity;
                                                $total +=$tongtien ;

                                            @endphp
                                            <tr class="color_quanity_{{$order->product_id}}">
                                                <td>{{$i}}</td>
                                                <td style="color: red">{{$order->product_id}}</td>
                                                <td>
                                                @if($order->product_coupon !='khong co coupon')
                                                    {{$order->product_coupon}}
                                                @else
                                                    Không có mã giảm giá
                                                @endif
                                                <input type="hidden" name="order_id" class="order_id" value="{{$order->product_id}}">
                                                <input type="hidden" name="order_quantitys" class="order_quantity_storage_{{$order->product_id}}" value="{{$order->product->prod_quantity}}">
                                                <input type="hidden" name="order_code" class="order_code" value="{{$order->order_code}}">
                                                </td>
                                                <td><img width="100px;" height="100px;" src="{{ asset('/public/anhSanPham/'.$order->product_image) }}" alt=""></td>
                                                <td>{{$order->product_name}}</td>
                                                         <td class="product_color">
                                                         @if($order->product_color==1)
                                                             Màu Đỏ
                                                          @elseif($order->product_color==2)
                                                             Màu Đen
                                                           @elseif($order->product_color==3)
                                                             Màu Trắng
                                                          @endif
                                                      </td>
                                                        <td class="product_size">
                                                          @if($order->product_color==1)
                                                             Size S
                                                          @elseif($order->product_color==2)
                                                             Size M
                                                           @elseif($order->product_color==3)
                                                             Size L
                                                           @elseif($order->product_color==4)
                                                             Size XL
                                                           @elseif($order->product_color==5)
                                                             Size XXL
                                                           @elseif($order->product_color==6)
                                                             Size M
                                                           @elseif($order->product_color==7)
                                                             Size M
                                                          @endif

                                                        </td>
                                                <td>{{number_format($order->product_price,0,',','.')}}VND</td>
                                                <td>{{$order->product->prod_quantity}}</td>
                                              

                                                <td><input type="number" {{$order_status ==2 ? 'disabled' : '' }} value="{{$order->product_quantity}}" class="order_quantity_{{$order->product_id}}" name="order_quantity">
                                                    <hr>
                                                     @if($order_status !=2)
                                                    <button name="update_quantity" data-product_id="{{$order->product_id}}" class="btn btn-warning update_quantity">Cập Nhập</button>
                                                    @endif
                                                </td>
                                            
                                                <td> {{number_format($tongtien,0,',','.')}}VND</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="2">

                                                @php
                                                    $total_coupon = 0;
                                                @endphp
                                                @if($coupon_condition==1)
                                                    @php
                                                        $total_after_coupon = ($total*$coupon_number)/100;
                                                        echo 'Tổng giảm:'.number_format($total_after_coupon,0,',','.').'VND'.'</br>';
                                                        $total_coupon=$total + $total_after_coupon + $order->product_freeship;
                                                    @endphp
                                                @else
                                                    @php
                                                        echo 'Tổng giảm:'.number_format($coupon_number,0,',','.').'VND'.'</br>';
                                                        $total_coupon=$total-$coupon_number + $order->product_freeship;
                                                    @endphp
                                                @endif
                                                Phí Ship: {{number_format($order->product_freeship,0,',','.')}}VND</br>
                                                Tiền Ship: {{number_format($total,0,',','.')}}VND </br>
                                                Khách Thanh Toán <h4>{{number_format($total_coupon,0,',','.')}}VND</h4>
                                            </td>
                                        </tr>
                                        <tr >
                                            <td colspan="10">
                                        @foreach( $orders as $or )

                                        @if($or->order_status==1)
                                         <form>
                                            {{csrf_field()}}
                                            <select class="form-control order_details" style="background-color: #e0d999">
                                                <option  value="">Chọn Hình Thức</option>
                                                <option id="{{$or->order_id}}" selected value="1">Chưa Xử Lý</option>
                                                <option id="{{$or->order_id}}" value="2">Đã Xử Lý</option>
                                            </select>
                                        </form>
                                        @else
                                         <form>
                                            {{csrf_field()}}
                                            <select class="form-control order_details">
                                                <option value="">Chọn Hình Thức</option>
                                                <option id="{{$or->order_id}}" value="1">Chưa Xử Lý</option>
                                                <option id="{{$or->order_id}}" selected value="2">Đã Xử Lý</option>

                                            </select>
                                        </form>
                                        @endif

                                        @endforeach
                                            </td>
                                        </tr>
                                        </tbody>                                     
                                    </table>
                                    <!-- <a href="{{asset('admin/print-order'.$order->order_code)}}">In Don Hang</a> -->
                                </div>
                            </div>
                        </div>
                        <div style="height: 100px"></div>
                       
                </main>
           </div>

@stop