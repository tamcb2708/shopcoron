@extends('welcome')
@section('content')
   <!--breadcrumbs area start-->
   <div class="breadcrumbs_area">
                            <div class="row">
                                <div class="col-12">
                                    <div class="breadcrumb_content">
                                        <ul>
                                            <li><a href="{{asset('/')}}">Trang Chủ</a></li>
                                            <li><i class="fa fa-angle-right"></i></li>
                                            <li>Tài Khoản Của Tôi</li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--breadcrumbs area end-->

                        <!-- Start Maincontent  -->
                        <section class="main_content_area">
                                <div class="account_dashboard">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-3 col-lg-3">
                                            <!-- Nav tabs -->
                                            <div class="dashboard_tab_button">
                                                <ul role="tablist" class="nav flex-column dashboard-list">
                                                    <li><a href="#dashboard" data-toggle="tab" class="nav-link active">Trang Cá Nhân</a></li>
                                                    <li> <a href="#orders" data-toggle="tab" class="nav-link">Đơn Hàng Bạn Đặt</a></li>
                                                    <li><a href="#account-details" data-toggle="tab" class="nav-link">Thông Tin Cá Nhân</a></li>
                                                </ul>
                                            </div>    
                                        </div>
                                        <div class="col-sm-12 col-md-9 col-lg-9">
                                            <!-- Tab panes -->
                                            <div class="tab-content dashboard_content">
                                                <div class="tab-pane fade show active" id="dashboard">
                                                    <h3>Xin Chào {{$customer->cus_name}}</h3> 
                                                    <p>Từ trang tổng quan tài khoản của bạn. bạn có thể dễ dàng kiểm tra &amp; Hóa Đơn Và Thông Tin Của Bạn <a href="{{asset('cart/my-account')}}">những đơn đặt hàng gần đây</a>, Quản Lý Thông Tin Cá Nhân Và Đổi Mật Khẩu <a href="{{asset('cart/my-account')}}">Thông Tin Cá Nhân</a></p>
                                                    <p>Mọi thông tin chi tiết liên hệ :   <i class="fa fa-mobile" aria-hidden="true"></i><a href="tel:0355978258">+0355 978 258</a></p>
                                                    <p> Hoặc :   <i class="fa fa-mobile" aria-hidden="true"></i><a href="tel:0982374911">+0982 374 911</a></p>
                                                    <a href="mailto:tamcb2708@gmail.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> tamcb2708@gmail.com</a>
                                                </div>
                                                <div class="tab-pane fade" id="orders">
                                                    <h3>Danh Sách Đơn Hàng</h3>
                                                    <div class="coron_table table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Số thứ tự</th>
                                                                    <th>Ngày gửi</th>
                                                                    <th>Trạng thái</th>
                                                                    <th>Mã Đơn</th>
                                                                    <th>Chức Năng</th>	 	 	 	
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                $i=0;
                                                                @endphp
                                                                @foreach($getorder as $order)
                                                                @php
                                                                $i++;
                                                                @endphp
                                                                <tr>
                                                                    <td>{{$i}}</td>
                                                                    <td>{{$order->created_at}}</td>
                                                                    <td><span class="success">
                                                                         @if($order->order_status==1)
                                                    <p style="background-color: #e6dc83">Đơn Hàng Đang Xử Lý</p>
                                                @else
                                                    <p style="background-color: #807d6a">Đơn Hàng Đã Xử Lý</p>
                                                @endif
                                                                    </span></td>
                                                                    <td>TTKTG{{$order->order_id}}{{$order->order_code}}</td>
                                                                    <td><a href="{{asset('cart/view-history/'.$order->order_code)}}" class="view">Chi Tiết</a></td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                
                                                <div class="tab-pane fade" id="account-details">
                                                    <h3>Thông Tin Cá Nhân</h3>
                                                    <div class="login">
                                                        <div class="login_form_container">
                                                            <div class="account_login_form">
                                                                <form action="{{asset('cart/save-user')}}">
                                                                    {{csrf_field()}}
                                                                    <br>
                                                                    <label>Họ Và Tên Của Bạn</label>
                                                                    <input type="text" name="use_name" value="{{$customer->cus_name}}">
                                                                    <label>Email Của Bạn</label>
                                                                    <input type="email" name="use_email" value="{{$customer->cus_email}}">
                                                                    <label>Mật Khẩu</label>
                                                                    <input type="password" name="use_password" value="{{$customer->cus_password}}">
                                                                    <label>Address</label>
                                                                    <input type="text"  value="{{$customer->cus_address}}" name="use_address">
                                                                    <label>Số Điện Thoại</label>
                                                                    <input type="text"  value="{{$customer->cus_phone}}" name="use_phone">
                                                                    <span class="example">
                                                                      (Mã Tài Khoản: {{$customer->cus_id}})
                                                                    </span>
                                                                    <br>
                                                                    <div class="save_button primary_btn default_button">
                                                                          <input required type="submit" style="background-color: #ccbc91;"  name="submit" class="form-control btn btn-primary"  value="Sửa Thông Tin">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>      	
                        </section>			
                        <!-- End Maincontent  --> 
                    </div>
                    <!--pos page inner end-->
                </div>
            </div>
            <!--pos page end-->
@stop