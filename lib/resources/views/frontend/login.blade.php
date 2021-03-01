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
                            <div class="row">
                                    <div class="col-12">
                                        <div class="breadcrumb_content">
                                            <ul>
                                                <li><a href="{{asset('/')}}">Trang Chủ</a></li>
                                                <li><i class="fa fa-angle-right"></i></li>
                                                <li>Đăng Nhập</li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!--breadcrumbs area end-->
                       <!-- customer login start -->
                        <div class="customer_login">
                            <div class="row">
                                       <!--login area start-->
                                        <div class="col-lg-6 col-md-6">
                                            <div class="account_form">
                                                <h2>Nơi Đăng Nhập</h2>
                                                <form action="{{asset('cart/login')}}" method="POST">
                                                    {{csrf_field()}}
                                                    <p>   
                                                        <label>Email<span>*</span></label>
                                                        <input type="text" name="email_account">
                                                     </p>
                                                     <p>   
                                                        <label>Mật Khẩu <span>*</span></label>
                                                        <input type="password" name="password_account">
                                                     </p>   
                                                    <div class="login_submit">
                                                        <input type="submit" style="background-color: #e0d999" name="login" value="login">
                                                        <label for="remember">
                                                            <input id="remember" type="checkbox">
                                                            Nhớ Tôi
                                                        </label>
                                                        <a href="#">Quên Mật Khẩu?</a>
                                                    </div>

                                                </form>
                                             </div>    
                                        </div>
                                        <!--login area start-->

                                        <!--register area start-->
                                        <div class="col-lg-6 col-md-6">
                                            <div class="account_form register">
                                                <h2>Nơi Đăng Ký</h2>
                                                <form action="{{asset('cart/add-customer')}}" method="POST">
                                                    {{csrf_field()}}
                                                    <p>   
                                                        <label> Email  <span>*</span></label>
                                                        <input type="text" placeholder="email@gmail.com" name="email">
                                                     </p>
                                                     <p>   
                                                        <label>Họ Và Tên <span>*</span></label>
                                                        <input type="text" placeholder="Name" name="name">
                                                     </p>
                                                    <p>   
                                                        <label> Địa Chỉ  <span>*</span></label>
                                                        <input type="text" placeholder="Email" name="address">
                                                     </p>
                                                     <p>   
                                                        <label>Mật Khẩu <span>*</span></label>
                                                        <input type="password" placeholder="********" name="password">
                                                     </p>
                                                      <p>   
                                                        <label>Số Điện Thoại <span>*</span></label>
                                                        <input type="number" placeholder="0982374911" name="phone">
                                                     </p>
                                                    <div class="login_submit">
                                                        <button type="submit">Đăng Ký</button>
                                                    </div>
                                                </form>
                                            </div>    
                                        </div>
                                        <!--register area end-->
                                    </div>
                        </div>
                        <!-- customer login end -->

                    </div>
                    <!--pos page inner end-->
                </div> 
            </div>
            <!--pos page end-->
           
            
@stop