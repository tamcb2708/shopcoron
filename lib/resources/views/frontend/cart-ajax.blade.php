@extends('welcome')
@section('content')
        <!--breadcrumbs area start-->
@if(Session::get('cart')==true)
                         <!--shopping cart area start -->
                       @if(session()->has('message'))
                           <div class="alert alert-success">
                             {!!session()->get('message')!!}
                           </div>
                       @else(session()->has('error'))
                            <div class="alert alert-success">
                             {!!session()->get('error')!!}
                           </div>
                       @endif
                        <div class="shopping_cart_area">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table_desc">
                                                   <form  method="POST" action="{{asset('cart/update-cart')}}">
                                                <div class="cart_page table-responsive">
                                                    <table>
                                                <thead>
                                                    <tr>
                                                        <th class="product_remove">Xóa Sản Phẩm</th>
                                                        <th class="product_thumb">Ảnh Sản Phẩm</th>
                                                        <th class="product_name">Tên Sản Phẩm</th>
                                                        <th class="product_color">Màu</th>
                                                        <th class="product_size">Kích Cỡ</th>       
                                                        <th class="product-price">Giá Sản Phẩm</th>
                                                        <th class="product-quantity">SL</th>
                                                        <th class="product_quantity">Số Lượng</th>
                                                        <th class="product_total">Tổng</th>
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
                                                    
                                                       <td class="product_remove"><a href="{{asset('cart/delete-cart/'.$cart['session_id'])}}"><i class="fa fa-trash-o"></i></a></td>
                                                        <td class="product_thumb"><a href="#"><img width="200px;" height="200px;" src="{{ asset('/public/anhSanPham/'.$cart['product_img']) }}" alt=""></a></td>
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
                                                        <td class="product-price">{{number_format($cart['product_pricenew'],0,',','.')}}VND
                                                        </td>
                                                        <td>{{$cart['product_quantity']}}</td>
                                                        <td class="product_quantity">
                                                            <input min="1" max="100" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}" type="number"  class="cart_quantity">
                                                        </td>

                                                        <td class="product_total"><p>{{number_format($subtotal,0,',','.')}}VND</p></td>
                                                     </tr>
                                                        @endforeach                                        
                                                </tbody>
                                            </table>   
                                             <div class="checkout_btn">
                                                      <input style="width: 200px;height: 30px; background-color: #3cdece; color: red" type="submit" value="Cập Nhập" name="cart_update" class="btn btn-default">
                                                      
                                                      <a href="{{asset('cart/delete-all')}}" class="btn btn-default">Xóa Tất Cả</a>
                                                       @if(Session::get('coupon'))
                                                        <a href="{{asset('cart/delete-coupon')}}" class="btn btn-default">Xóa Mã Khuyến Mãi</a>
                                                        @endif
                                                    </div>  

                                                </div>  
                                                </form>
                                                <div class="cart_submit">
                                                </div>      
                                            </div>
                                         </div>
                                        
                                     </div>
                                     <!--coupon code area start-->
                                    <div class="coupon_area">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="coupon_code">
                                                    <h3>Nhập Mã Giảm Giá</h3>
                                                    <form method="POST" action="{{asset('cart/check_coupon')}}">
                                                      @csrf
                                                    <div class="coupon_inner">   
                                                        <p>Nhập Mã Giảm Giá Nếu Bạn Có</p>
                                                        @if(Session::get('coupon'))
                                                            @foreach(Session::get('coupon') as $cou)
                                                                 @if($cou['coupon_condition']==1)

                                                                     Mã Giảm :{{$cou['coupon_number']}} % Giá trị giỏ hàng
                                                                 
                                                                      <p>
                                                                            @php
                                                                               $total_coupon=($total*$cou['coupon_number'])/100;
                                                                               echo '<p>Tổng tiền được giảm:'.number_format($total_coupon,0,',','.').'VND</p>'
                                                                            @endphp
                                                                       </p>
                                                                      <h3>Tổng Tiền Sau Khi Giảm: {{number_format($total-$total_coupon,0,',','.')}} VND</h3>
                                                                  @elseif($cou['coupon_condition']==2)
                                                                      Mã Giảm : {{number_format($cou['coupon_number'],0,',','.')}} VND;
                                                                 
                                                                      <p>
                                                                            @php
                                                                               $total_coupon=$total-$cou['coupon_number'];
                                                                            @endphp
                                                                       </p>
                                                                      <h3>Tổng Tiền Sau Khi Giảm: {{number_format($total_coupon,0,',','.')}} VND</h3>
                                                 
                                                                 @endif
                                                            @endforeach
                                                        
                                                        @endif                                
                                                        <input placeholder="Nhập Mã Giảm Giá" name="coupon" type="text">
                                                        <input style=" background-color: #3cdece; color: wite" type="submit" name="check_coupon" class="btn btn-default check_coupon" value="Mã Giảm Giá">

                                                    </div>
                                                    </form>   
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="coupon_code">
                                                    <h3>Tổng Tiền</h3>
                                                    <div class="coupon_inner">
                                                    

                                                       <div class="cart_subtotal">
                                                           <p>Tổng Tiền Chưa Trừ :</p>
                                                           <p class="cart_amount">{{number_format($total,0,',','.')}}VND</p>
                                                       </div>
                                                       <div class="checkout_btn">
                                                        @if(Session::get('cus_id'))
                                                           <a href="{{asset('/cart/check-out-ajax')}}">Thanh Toán</a>
                                                        @else
                                                           <a href="{{asset('/cart/login-checkout')}}">Thanh Toán</a>
                                                        @endif
                                                       </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                                           
                                            
                                              
                                          </div>
                                          


                              
                             
                        
                         </div>
                         <!--shopping cart area end -->



                    </div>
                    <!--pos page inner end-->
                </div>
            </div>
            <!--pos page end-->
@else
 <!--error section area start-->
              <div class="error_section">
                            <div class="row">
                                <div class="col-12">
                                    <div class="error_form">
                                        <h1>Giỏ Hàng Trống</h1>
                                        <h2>Hãy mua Thêm sản phẩm cho vào giỏ hàng</h2>
                                        <p>Tìm Kiếm Sản Phẩm</p>
                                        <form  method="get" role="search" action="{{asset('search/')}}">
                                            <input placeholder="Nhập từ khóa tìm kiếm..." type="text">
                                            <button type="submit"><i class="fa fa-search"></i></button>
                                        </form>
                                        <a href="{{asset('/shopone')}}">Quay trở lại Cửa Hàng</a>
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

            <!--pos page end-->
