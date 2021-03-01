@extends('welcome')
@section('content')

@if(Session::get('cart')==true)
        <!--Checkout page section-->
                  <div class="container"> <h3 style=" background-color: #bccff7"> <i><?php
                         $message=Session::get('message');
                        if($message){
                            echo '<span class="text-alert">'.$message. '</span>' ;
                            Session::put('message',null);
                        }
                        ?></i></h3></div>
                        <div class="Checkout_section">
                            <div class="checkout_form">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <form >
                                                     {{csrf_field()}}
                                                   <h3>Hóa Đơn Của Bạn</h3>
                                                <div class="row">
                                                    <div class="col-12 mb-30">
                                                             <label for="order_note">Lưu Ý</label>
                                                            <input type="text" readonly value="Nhập Chính Xác Thông Tin Nhận Hàng" name="">
                                                        </div> 

                                            
                                                    <div class="col-12 mb-30">
                                                                    <label>Điền Email</label>
                                                                    <input type="email" name="shipping_email" placeholder="email@gmail.com" class="shipping_email">     
                                                                </div>
                                                

                                                     <div class="col-12 mb-30">
                                                                    <label>Điền Tên Người Nhận</label>
                                                                    <input type="text" placeholder="
                                                                    Nguyễn Văn A" name="shipping_name" class="shipping_name">     
                                                                </div>
                                                                <div class="col-12 mb-30">
                                                                    <label>Điền Địa Chỉ Nhận Hàng</label>
                                                                    <input type="text" name="shipping_address" placeholder="ngõ 32- phan văn trường-cầu giấy-hà nội" class="shipping_address">     
                                                                </div>
                                          
                                                    <div class="col-12 mb-30">
                                                                    <label>Ghi Chú</label>
                                                                    <textarea class="shipping_note" placeholder="lưu ý cho người giao hàng" rows="5" name="shipping_note"></textarea>
                                                                </div>
                                                      <div class="col-12 mb-30">
                                                                    <label>Số Điện Thoại Người Nhận</label>
                                                                    <input type="number" name="shipping_phone" placeholder="0982374911" class="shipping_phone">     
                                                                </div>

                                                                   <div class="col-6 md30">
                                                                    <label>Giá Giao Hàng</label>
                                                                    @if(Session::get('free'))
                                                                        <input type="text" readonly name="order_free" class="order_free
                                                                        " value="{{Session::get('free')}}">
                                                                    @else
                                                                        <input type="text" readonly name="" value="Tính Phí Ship Để Xem Giá Ship của Ban">
                                                                    @endif
                                                                    @if(Session::get('coupon'))
                                                                       @foreach(Session::get('coupon') as $cou)
                                                                        <input type="hidden" name="order_coupon" class="order_coupon
                                                                        " value="{{$cou['coupon_code']}}">
                                                                        @endforeach
                                                                    @else
                                                                        <input type="hidden" name="order_coupon" class="order_coupon
                                                                        " value="khong co coupon">
                                                                    @endif
                                                                    
                                                                </div>
                                                                  <div class="col-12 mb-30">
                                                                    <div class="select_form_select">
                                                                        <label for="countru_name">Chọn Phương Thức Thanh Toán <span>*</span></label>
                                                                        <select name="shipping_method" class="shipping_method"  id="shipping_method"> 
                                                                            <option value="0">Chuyển Khoản Ngân Hàng</option>      
                                                                            <option value="1">Nhận Hàng Rồi Thanh Toán</option>   

                                                                        </select>
                                                                    </div> 
                                                                </div>
                                                                   <input style="color: #28d4c3; height: 100px; background-color:#282e2d" type="button" name="send_order" value="Xác Nhận Đơn Hàng" class="btn btn-primary btn-sm send_order_detail">
                                                                    <div class="col-12">
                                                       
                                                    </div> 


                                               
                                                
                                                   
                                                    <!-- <input type="submit" name="send" value="gui di" class="btn-primary"> -->
                                            </form>
                                            <form  >
                                                {{csrf_field()}}
                                              
                                                    <div class="col-12 mb-30">
                                                    
                                                        <label class="righ_0" for="address" data-toggle="collapse" data-target="#collapsetwo" aria-controls="collapseOne" style="background-color: white"></label>

                                                        <div id="collapsetwo" class="collapse one" data-parent="#accordion">
                                                           <div class="row">
                                                                <div class="col-12 mb-30">
                                                                    <label>Điền Email</label>
                                                                    <input type="email" name="shipping_email" placeholder="email@gmail.com" class="shipping_email">     
                                                                </div>
                                                                <div class="col-12 mb-30">
                                                                    <label>Điền Tên Người Nhận</label>
                                                                    <input type="text" placeholder="
                                                                    Nguyễn Văn A" name="shipping_name" class="shipping_name">     
                                                                </div>
                                                                <div class="col-12 mb-30">
                                                                    <label>Điền Địa Chỉ Nhận Hàng</label>
                                                                    <input type="text" name="shipping_address" placeholder="ngõ 32- phan văn trường-cầu giấy-hà nội" class="shipping_address">     
                                                                </div>
                                                                <div class="col-12 mb-30">
                                                                    <label>Ghi Chú</label>
                                                                    <textarea class="shipping_note" placeholder="lưu ý cho người giao hàng" rows="5" name="shipping_note"></textarea>
                                                                </div>
                                                                <div class="col-12 mb-30">
                                                                    <label>Số Điện Thoại Người Nhận</label>
                                                                    <input type="number" name="shipping_phone" placeholder="0982374911" class="shipping_phone">     
                                                                </div>
                                                                <div class="col-6 md30">
                                                                    @if(Session::get('free'))
                                                                        <input type="hidden" name="order_free" class="order_free
                                                                        " value="{{Session::get('free')}}">
                                                                    @else
                                                                        <input type="hidden" name="order_free" class="order_free
                                                                        " value="10000">
                                                                    @endif
                                                                    @if(Session::get('coupon'))
                                                                       @foreach(Session::get('coupon') as $cou)
                                                                        <input type="hidden" name="order_coupon" class="order_coupon
                                                                        " value="{{$cou['coupon_code']}}">
                                                                        @endforeach
                                                                    @else
                                                                        <input type="hidden" name="order_coupon" class="order_coupon
                                                                        " value="khong co coupon">
                                                                    @endif
                                                                    
                                                                </div>
                                                                <div class="col-12 mb-30">
                                                                    <div class="select_form_select">
                                                                        <label for="countru_name">Chọn Phương Thức Thanh Toán <span>*</span></label>
                                                                        <select name="shipping_method" class="shipping_method"  id="shipping_method"> 
                                                                            <option value="0">Chuyển Khoản Ngân Hàng</option>      
                                                                            <option value="1">Nhận Hàng Rồi Thanh Toán</option>   

                                                                        </select>
                                                                    </div> 
                                                                </div>

                                                             <input style="color: #28d4c3; height: 100px; background-color:#282e2d" type="button" name="send_order" value="Xác Nhận Đơn Hàng" class="btn btn-primary btn-sm send_order_detail">
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                                  
                                            </form>    
<!--                                                   <a class="btn btn-primary check_out" href="{{asset('cart/login-checkout')}}">check</a>
 -->
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                             
                                                <h3>Phiếu Sản Phẩm</h3> 
                                                <div class="order_table table-responsive mb-30">
                                                          <form  method="POST" action="{{asset('cart/update-cart')}}">
                           <div class="">
                                                <div class="cart_page table-responsive">
                                                    <table>
                                                <thead>
                                                    <tr>
                                                        <th class="product_thumb"></th>
                                                        <th class="product_name">Tên Sản Phẩm</th>
                                                        <th class="product_color">Màu</th>
                                                        <th class="product_size">Kích Cỡ</th>       
                                                        <th class="product-price">Giá </th>
                                                        <th class="product_quantity">Số Lượng</th>
                                                        <th class="product_total">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                              
                            @csrf
                                                @php
                                                   $total=0;
                                                @endphp
                                                @foreach(Session::get('cart') as $cart)
                                               
                                                   @php
                                                      $subtotal= $cart['product_pricenew']*$cart['product_qty'];
                                                      $total+=$subtotal;
                                                   @endphp
                                                    <tr>
                                                    
                                                
                                                        <td class="product_thumb"><a href="#"><img width="
                                                            100px;" height="130px" src="{{ asset('/public/anhSanPham/'.$cart['product_img']) }}" alt=""></a></td>
                                                        <td class="product_name">{{$cart['product_name']}}</td>
                                                         <td class="product_color">
                                                         @if($cart['product_color']==1)
                                                             Màu Đỏ
                                                          @elseif($cart['product_size']==2)
                                                             Màu Đen
                                                           @elseif($cart['product_size']==3)
                                                             Màu Trắng
                                                          @endif
                                                      </td>
                                                        <td class="product_size">
                                                          @if($cart['product_size']==1)
                                                             Size S
                                                          @elseif($cart['product_size']==2)
                                                             Size M
                                                           @elseif($cart['product_size']==3)
                                                             Size L
                                                           @elseif($cart['product_size']==4)
                                                             Size XL
                                                           @elseif($cart['product_size']==5)
                                                             Size XXL
                                                           @elseif($cart['product_size']==6)
                                                             Size M
                                                           @elseif($cart['product_size']==7)
                                                             Size M
                                                          @endif

                                                        </td>
                                                        <td class="product-price">{{number_format($cart['product_pricenew'],0,',','.')}}VND</td>
                                                        <td class="product_quantity">
                                                            {{$cart['product_qty']}}
                                                        </td>

                                                        <td class="product_total"><p>{{number_format($subtotal,0,',','.')}}VND</p></td>
                                                     </tr>
                                                        @endforeach                                        
                                                </tbody>
                                            </table>   
                                             <div class="checkout_btn">
                                                <div class="row">
                                                <div> 
                                                       @if(Session::get('coupon'))
                                                        <a href="{{asset('cart/delete-coupon')}}" class="btn btn-default">Xóa Mã Khuyến Mãi</a>
                                                        @endif
                                                        </div>
                                                    </div>  

                                                </div>
                                                </div>  
                                                </form>
                                                <hr>
                                                <h3>Bảng Tính Giá Tiền Ship</h3> 
                                                    <form>
                                                        <?php
                                                            $message=Session::get('message');
                                                            if($message){
                                                               echo '<span class="text-alert">'.$message. '</span>' ;
                                                                 Session::put('message',null);
                                                             }
                                                           ?>
                                                            <div class="panel-body">
                                                           @include('errors.note')
                                    <form>
                                       <div class="col-12 mb-30">
                                                                    <label style="background-color: #e0d999" > Chọn Thành/Phố   </label>
                                                                      <select name="city" id="city" class="form-control input-sm m-bot15 choose city" >
                                                <option value=""><<----------------------------------Chọn Thành/Phố-------------------------------->>></option>
                                                    @foreach($city as $ci)
                                                    <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                                    @endforeach
                                               
                                           </select>

                                         </div> 
                                          <div class="col-12 mb-30">
                                                                    <label style="background-color: #e0d999"> Chọn Quận/Huyện  </label>
                                                                        <select name="province" id="province" class="form-control input-sm m-bot15 province choose" >
                                                <option value=""><<----------------------------------Chọn Quận/Huyện-------------------------------->></option>
                                        
                                            </select>


                                         </div> 
                                        
                                           <div class="col-12 mb-30">
                                                                    <label style="background-color: #e0d999"> Chọn Xã/Phường  </label>
                                                <select name="wards" id="wards" class="form-control input-sm m-bot15  wards" >
                                                <option value=""><<----------------------------------Chọn Xã/Phường-------------------------------->>></option>
                                            </select>
                                        
                                            </select>
                                            <hr>
                                         <div class="col-lg-6">
                                                <input style="background-color: #e0d999" type="button" value="Tính Phí Vận Chuyển" name="calculate_order" class="
                                                  calculate_delivery">
                                            
                                        </div>
                                        {{csrf_field()}}
                                    </form>
                                </div>
                                                    </form>

                                            
                                                </div>
                                              
                                                   
                                        </div>

                                    </div> 
                                </div> 

                                     <div class="col-md-12">
                   
                                                                <div class="coupon_area">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="coupon_code">
                                                    <h3>Mã Giảm Giá</h3>
                                                    <form method="POST" action="{{asset('cart/check_coupon')}}">
                                                      @csrf
                                                    <div class="coupon_inner">   
                                                        <p>Nhập Mã Giảm Giá Nếu Bạn Có.</p>
                                                        @if(Session::get('coupon'))
                                                            @foreach(Session::get('coupon') as $cou)
                                                                 @if($cou['coupon_condition']==1)

                                                                     Mã Giảm :{{$cou['coupon_number']}} % giá trị giỏ hàng
                                                                 
                                                                      <p>
                                                                            @php
                                                                               $total_coupon=($total*$cou['coupon_number'])/100;
                                                                               echo '<p style="background-color: #c1e6d4">Tổng tiền được giảm: '.number_format($total_coupon,0,',','.').'VND</p>'
                                                                            @endphp
                                                                       </p>
                                                                      <p> 
                                                                    @php
                                                                      $total_after_coupon= $total-$total_coupon;
                                                                      echo '<h3 style="color: red">Tổng tiền được giảm : '.number_format($total_after_coupon,0,',','.').'VND</p>'
                                                                    @endphp
                                                                   </h3>
                                                                @elseif($cou['coupon_condition']==2)
                                                                      Mã Giảm : {{number_format($cou['coupon_number'],0,',','.')}} VND;
                                                                 
                                                                      <p>
                                                                            @php
                                                                               $total_coupon=$total-$cou['coupon_number'];
                                                                               echo '<p>Tổng tiền được giảm:'.number_format($total_coupon,0,',','.').'VND</p>'
                                                                            @endphp
                                                                       </p>
                                                                    @php
                                                                      $total_after_coupon= $total_coupon;
                                                                      echo '<h3>Tổng tiền được giảm : '.number_format($total_after_coupon,0,',','.').'VND</p>' 
                                                                    @endphp
                                                                      
                                                 
                                                                 @endif
                                                            @endforeach
                                                        
                                                        @endif                                
                                                        <input placeholder="Nhập mã giảm giá tại đây" name="coupon" type="text">
                                                        <input type="submit" style="background-color: #e0d999" name="check_coupon" class="btn btn-default check_coupon" value="Nhập">

                                                    </div>
                                                    </form>   
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="coupon_code">
                                                    <h3>Tổng tiền</h3>
                                                    <div class="coupon_inner">
                                                    

                                                       <div class="cart_subtotal">
                                                           <p>Tổng tiền giỏ hàng:</p>
                                                           <p class="cart_amount">{{number_format($total,0,',','.')}}VND</p>
                                                          @if(Session::get('free'))
                                                               <hr>
                                                           <p>Phí Vận Chuyển:</p>
                                                           <p>{{number_format(Session::get('free'),0,',','.')}}VND</p>
                                                           <a href="{{asset('cart/delete-free')}}"><i class="fa fa-trash-o"></i></a>
                                                           <?php  $total_after_free=Session::get('free');  ?>

                                                          @endif
                                                          <hr>
                                                          <br>
                                                          <div>
                                                          <u style="background-color: #05fa88">Tổng Tiền</u>
                                                        <h5>
                                               <!-- tinh tong tien -->
                                               @php
                                                  if(Session::get('free') && !Session::get('coupon')){
                                                  $total_after=$total + $total_after_free;
                                                  echo number_format($total_after,0,',','.').'VND';

                                              }elseif(!Session::get('free') && Session::get('coupon')){
                                              $total_after=$total_after_coupon;
                                              echo number_format($total_after,0,',','.').'VND';

                                          }elseif(Session::get('free') && Session::get('coupon')){
                                          $total_after=$total_after_coupon;
                                          $total_after=$total_after+Session::get('free');
                                          echo number_format($total_after,0,',','.').'VND';
                                      }elseif(!Session::get('free') && !Session::get('coupon')){
                                      $total_after=$total;
                                      echo number_format($total_after,0,',','.').'VND';

                                  }
                                               @endphp
                                               </h5>
                                           </div>
                                                       </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                              
                                    </div> 
                                </div>
                                </div>        
                        </div>
                        <!--Checkout page section end-->
            @else
            <!--error section area start-->
              <div class="error_section">
                            <div class="row">
                                <div class="col-12">
                                    <div class="error_form">
                                        <h1>Tuấn Tâm IT</h1>
                                        <h2>Đơn hàng của bạn đã được gửi</h2>
                                        <p>Cân tất cả ngôn ngữ: C, C#, python, PHP,web MVC, web Laravel, jquejy, wix.com và localhost:tam.com:119078</p>
                                        <a href="{{asset('/')}}">Quay trở lại trang chủ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--error section area end-->   
                    </div>
                    <!--pos page inner end-->
                </div>
            </div>
            <!--pos page end-->
            @endif
@stop