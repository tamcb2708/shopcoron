@extends('welcome')
@section('content')
        <!--breadcrumbs area start-->
                @if(session()->has('message'))
                           <div class="alert alert-success">
                             {!!session()->get('message')!!}
                           </div>
                       @else(session()->has('error'))
                            <div class="alert alert-success">
                             {!!session()->get('error')!!}
                           </div>
                       @endif
        <div class="breadcrumbs_area">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="breadcrumb_content">
                                            <ul>
                                                <li><a href="{{asset('cart/my-account')}}">Xem Thêm Đơn Hàng</a></li>
                                                <li><i class="fa fa-angle-right"></i></li>
                                                <li>Chi Tiết Đơn Hàng</li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
      <div class="container">
        <div class="col-md-12">
           @if($order_status==1)
            <a href="{{asset('cart/order/delete/'.$order_code)}}" onclick="return confirm('Bạn chắc chắn muốn hủy đơn hàng ?')" class="btn btn-danger"> <span class="glyphicon glyphicon-edit"></span>Hủy Đơn Hàng</a>     
           @endif     
        </div>
                                        <div  >
                                    <h4>Thông tin Vận Chuyển</h4>
                                    <table class="table table-bordered" style="padding: 300px width: 50%; height: 100%;">
                                        <thead>
                                             <tr class="bg-primary">
                                            <th>Tên Người Nhận</th>
                                            <th>Địa Chỉ Người Nhận</th>
                                            <th>Số Điện Thoại</th>
                                            <th>email người nhận</th>
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
                                    <h4>Danh Sách Sản Phẩm </h4>
                                    <table class="table table-bordered" style="padding: 300px width: 50%; height: 100%;">
                                        <thead>
                                             <tr class="bg-primary">
                                            <th>Số Thứ Tự</th>
                                            <th>Mã Sản Phẩm</th>
                                            <th>Ảnh Sản Phẩm</th>
                                            <th>Tên Sản Phẩm</th>
                                            <th>Màu Sắc</th>
                                            <th>Kích Cỡ</th>
                                            <th>Giá Tiền</th>
                                            <th>Số Lượng Bạn Đặt</th>
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
                                                <input type="hidden" name="order_id" class="order_id" value="{{$order->product_id}}">
                                                <input type="hidden" name="order_quantitys" class="order_quantity_storage_{{$order->product_id}}" value="{{$order->product->prod_quantity}}">
                                                <input type="hidden" name="order_code" class="order_code" value="{{$order->order_code}}">
                                    
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
                                              

                                                <td><input type="number" readonly {{$order_status ==2 ? 'disabled' : '' }} value="{{$order->product_quantity}}" class="order_quantity_{{$order->product_id}}" name="order_quantity">
                                                
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
                                                Bạn Thanh Toán <h4>{{number_format($total_coupon,0,',','.')}}VND</h4>
                                            </td>
                                        </tr>
                                
                                        </tbody>                                     
                                    </table>
                                    <!-- <a href="{{asset('admin/print-order'.$order->order_code)}}">In Don Hang</a> -->

                                </div>

      </div>

    </div>
        
@stop

            <!--pos page end-->
