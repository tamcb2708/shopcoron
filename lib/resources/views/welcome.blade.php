<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <base href="{{asset('public')}}/">
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Coron - cửa hàng quần áo thời trang</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets\img\favicon.png">
        
        <!-- all css here -->
        <link rel="stylesheet" href="assets\css\bootstrap.min.css">
        <link rel="stylesheet" href="assets\css\plugin.css">
        <link rel="stylesheet" href="assets\css\bundle.css">
        <link rel="stylesheet" href="assets\css\style.css">
        <link rel="stylesheet" href="assets\css\responsive.css">
        <link rel="stylesheet" href="assets\css\sweetalert.css">
    </head>
    <body>
            <!-- Add your site or application content here -->
            
            <!--pos page start-->
            <div class="pos_page">
                <div class="container">
                   <!--pos page inner-->
                    <div class="pos_page_inner">  
                       <!--header area -->
                        <div class="header_area">
                               <!--header top--> 
                                <div class="header_top">
                                   <div class="row align-items-center">
                                        <div class="col-lg-6 col-md-6">
                                           <div class="switcher">
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="header_links">
                                                <ul>
                                                            <li><a href="{{asset('withlist/muc-yeu-thich')}}">Sản Phẩm Yêu Thích</a></li>
                                                            <?php
                                                                $cus_id=Session::get('cus_id');
                                                                $ship_id=Session::get('ship_id');
                                                                $cart=Session::get('cart');
                                                                if($cus_id!=NULL && $ship_id==NULL ){
                                                            ?>
                                                             <li><a href="{{asset('/cart/gio-hang')}}">giỏ hàng</a></li>
                                                             <?php
                                                               }elseif($cus_id!=NULL && $ship_id!=NULL){
                                                             ?>
                                                             <li><a href="{{asset('wishlist')}}">Sản Phẩm Yêu Thích</a></li>
                                                             
                                                             <li><a href="{{asset('/cart/check-out-ajax')}}">Thanh Toán</a></li>
                                                             <?php
                                                               }else{
                                                             ?>
                                                              
                                                             <?php
                                                                }
                                                             ?>               
                                                     <?php 
                                                        $cus_id=Session::get('cus_id');
                                                        if($cus_id !=NULL){
                                                    ?>
                                                    <li><a href="{{asset('cart/my-account')}}">Tài Khoản và lịch sử mua hàng</a></li>
                                                    <?php
                                                       }else{
                                                    ?>
                                                   <?php 
                                                       }
                                                   ?>
                                                    
                                                    <?php 
                                                        $cus_id=Session::get('cus_id');
                                                        if($cus_id !=NULL){
                                                    ?>
                                                    <li><a href="{{asset('cart/logout-checkout')}}">Đăng Xuất</a></li>
                                                    <?php
                                                       }else{
                                                    ?>
                                                    <li><a href="{{asset('cart/login-checkout')}}">Đăng Nhập</a></li>
                                                   <?php 
                                                       }
                                                   ?>
                                                </ul>
                                            </div>   
                                        </div>
                                   </div> 
                                </div> 
                                <!--header top end-->

                                <!--header middel--> 
                                <div class="header_middel">
                                    <div class="row align-items-center">
                                       <!--logo start-->
                                        <div class="col-lg-3 col-md-3">
                                            <div class="logo">
                                                <a href="{{asset('/')}}"><img src="assets\img\logo\logo.jpg.png" alt=""></a>
                                            </div>
                                        </div>
                                        <!--logo end-->
                                        <div class="col-lg-9 col-md-9">
                                            <div class="header_right_info">
                                                <div class="search_bar">
                                                    <form class="navbar-form" method="get" role="search" action="{{asset('search/')}}">
                                                        <input placeholder="Nhập từ khóa sản phẩm cần tìm..." name="result" type="text">
                                                        <button type="submit"><i class="fa fa-search"></i></button>
                                                    </form>
                                                </div>
                                                 <div class="shopping_cart">
                                                    <?php
                                                        $car=Session::get('cart');
                                                        if($car==null){
                                                    ?>
                                                     <i class="" style=""><p style="background-color: #e0d999">Giỏ Hàng Trống</p></i>
                                                    <?php
                                                     }else{
                                                    ?>
                                                    <a  href="{{asset('cart/gio-hang')}}">Giỏ Hàng </a>
                                                    <?php
                                                     }
                                                    ?>
                                                </div>

                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>     
                                <!--header middel end-->      
                            <div class="header_bottom">
                                <div class="row">
                                        <div class="col-12">
                                            <div class="main_menu_inner">
                                                <div class="main_menu d-none d-lg-block">
                                                    <nav>
                                                        <ul>
                                                             <li>
                                                                <a href="{{asset('/')}}">Home</a>
                                                                
                                                            </li>
                                                            <li>
                                                                <a href="{{asset('shopone')}}">Sản Phẩm</a>
                                                                
                                                            </li>
                                                            <li>
                                                                <a href="{{asset('category/1')}}">Quần Áo Nam</a>
                                                            </li>
                                                            <li><a href="{{asset('category/2')}}">Quần Áo Nữ</a></li>
                                                            
                                                            <li><a href="{{asset('blog')}}">Tin Tức</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{asset('service')}}">Nhà Thiết Kế</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{asset('faq')}}">Các Câu Hỏi Thường Gặp</a>
                                                            </li>
                                                             <li >
                                                                <a href="{{asset('contact')}}">Liên Hệ</a>          
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                </div>
                                                <div class="mobile-menu d-lg-none">
                                                    <nav>
                                                        <ul>
                                                            <li><a href="{{asset('/')}}">Trang Chủ</a>
                                                               
                                                            </li>
                                                            <li><a href="{{asset('/')}}">Sản Phẩm</a>
                                                        
                                                            </li>
                                                            
                                                            <li><a href="{{asset('blog')}}">Bài Viết</a>
                                                    
                                                            </li>
                                                            <li><a href="{{asset('contact')}}">Liên Hệ</a></li>

                                                        </ul>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <!--header end -->




           <!--footer area start-->
           @yield('content')
           <div class="footer_area">
                <div class="footer_top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="footer_widget">
                                    <h3>Về Chúng Tôi</h3>
                                    <p>Coron trang mua sắm trực tuyến của Tuấn Tâm IT, thời trang nam, nữ, phụ kiện, giúp bạn tiếp cận xu hướng thời trang mới nhất.</p>
                                    <div class="footer_widget_contect">
                                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>  32-Phan Văn Trường-Hà Nội</p>

                                        <p><i class="fa fa-mobile" aria-hidden="true"></i><a href="tel:0355978258">+0355 978 258</a></p>
                                        <p><i class="fa fa-mobile" aria-hidden="true"></i><a href="tel:0982374911">+0982 374 911</a></p>
                                        <a href="mailto:tamcb2708@gmail.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> tamcb2708@gmail.com</a>
                                    </div>
                                </div>
                            </div>
                           <!--  <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="footer_widget">
                                    <h3>My Account</h3>
                                    <ul>
                                        <li><a href="{{asset('errors')}}">Your Account</a></li>
                                        <li><a href="{{asset('errors')}}">My orders</a></li>
                                        <li><a href="{{asset('errors')}}">My credit slips</a></li>
                                        <li><a href="{{asset('errors')}}">My addresses</a></li>
                                        <li><a href="{{asset('errors')}}">Login</a></li>
                                    </ul>
                                </div>
                            </div> -->
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="footer_widget">
                                    <h3>Thông Tin Cần Biết</h3>
                                    <ul>
                                        <li><a href="{{asset('gioi-thieu')}}">Giới Thiệu</a></li>
                                        <li><a href="{{asset('about')}}">Giới Thiệu về chúng tôi</a></li>
                                        <li><a href="{{asset('huong-dan-mua-hang')}}">Hướng Dẫn Mua Hàng</a></li>
                                        <li><a href="{{asset('huong-dan-giao-hang')}}">  Hướng Dẫn Giao Hàng  </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="footer_widget">
                                    <h3>Điều Khoản</h3>
                                    <ul>
                                        <li><a href="{{asset('policy')}}"> Chính sách đổi trả </a></li>
                                        <li><a href="{{asset('dieu-khoan-dich-vu')}}">  Điều Khoản   </a></li>
                                        <li><a href="{{asset('chinh-sach-bao-mat')}}">  Chính sách bảo mật  </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer_bottom">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="copyright_area">
                            
                                    <p>Coron By Tuấn Tuấn IT<a href="{{asset('about')}}"> Coron Shop</a>. All rights reserved. </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="footer_social text-right">
                                    <ul>
                                        <li><a href="{{asset('errors')}}"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="{{asset('errors')}}"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="{{asset('errors')}}"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                        <li><a class="pinterest" href="{{asset('errors')}}"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                        <li><a href="{{asset('errors')}}"><i class="fa fa-wifi" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer area end-->
           <!-- all js here -->
           <script src="assets\js\vendor\jquery-1.12.0.min.js"></script>
        <script src="assets\js\jquery-3.5.1.min.js"></script>
        <script src="assets\js\jquery-1.12.4.js"></script>
        <script src="assets\js\vendor\modernizr-2.8.3.min.js"></script>
        <script src="assets\js\popper.js"></script>
        <script src="assets\js\bootstrap.min.js"></script>
        <script src="assets\js\jquery.unobtrusive-ajax.js"></script>
        <script src="assets\js\jquery.unobtrusive-ajax.min.js"></script>
        <script src="assets\js\ajax-mail.js"></script>
        <script src="assets\js\sweetalert.min.js"></script>
        <script src="assets\js\weetalert.js"></script>
        <script type="text/javascript">
            function remove_background(product_id){
                for(var count=1;count<=5;count++){
                    $('#'+product_id+'-'+count).css('color','#ccc');
                }
            }
            $(document).on('mouseenter','.rating',function(){
                var index = $(this).data("index");
                var product_id=$(this).data('product_id');
                remove_background(product_id);
                for(var count=1;count<=index;count++){
                    $('#'+product_id+'-'+count).css('color','#03fcf0');
                }
            });
            $(document).on('mouleave','.rating',function(){
                var index=$(this).data("index");
                var product_id=$(this).data('product_id');
                var rating=$(this).data('rating');
                remove_background(product_id);
                for(var count=1;count<=rating;count++){
                    $('#'+product_id+'-'+count).css('color','#03fcf0');
                }
            });
            $(document).on('click','.rating',function(){
                var index=$(this).data("index");
                var product_id=$(this).data('product_id');
                var _token=$('input[name="_token"]').val();
                $.ajax({
                    url: '{{url('/insert-rating')}}',
                    method:'POST',
                    data:{index:index,product_id:product_id,_token:_token},
                    success:function(data)
                    {
                        if(data=='done')
                        {
                            alert("Bạn Đánh Giá"+index+"Trên 5");
                        }
                        else
                        {
                            alert("Lỗi Đánh Giá");
                        }
                    }
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.send_order_detail').click(function(){
                    swal({
                         title: "Xác Nhận Đơn Hàng",
                         text: "Đơn Hàng Sẽ Không Được Hoàn Trả Sau Khi Đặt, Bạn Có Muốn Đặt Không ?",
                         type: "warning",
                         showCancelButton: true,
                         confirmButtonClass: "btn-danger",
                         confirmButtonText: "Tôi Đồng !",
                         cancelButtonText: "Không, Tôi Muốn Mua Thêm  !",
                         closeOnConfirm: false,
                         closeOnCancel: false
                        },
                    function(isConfirm){

                        if (isConfirm) {
                    var shipping_email = $('.shipping_email' ).val();
                    var shipping_name = $('.shipping_name' ).val();
                    var shipping_address = $('.shipping_address' ).val();
                    var shipping_phone = $('.shipping_phone' ).val();
                    var shipping_note = $('.shipping_note' ).val();
                    var shipping_method = $('.shipping_method' ).val();
                    var order_free = $('.order_free' ).val();
                    var order_coupon = $('.order_coupon' ).val();
                    var _token=$('input[name="_token"]').val();
                    // alert(shipping_email);
                    // alert(shipping_name);
                    // alert(shipping_address);
                    // alert(shipping_phone);
                    // alert(shipping_note);
                    // alert(order_free);
                    // alert(order_coupon);
                    // alert(shipping_method);
                    $.ajax({
                        url: '{{url('/confirm-order')}}',
                        method:'POST',
                        data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,shipping_phone:shipping_phone,shipping_note:shipping_note,order_free:order_free ,order_coupon:order_coupon,_token:_token,shipping_method:shipping_method},
                        success:function(){
                          swal("Thông Tin Đơn ", "Đơn Hàng Của Bạn Đã Được Gửi Thành Công.", "success");

                        }
                    });
                    window.setTimeout(function(){
                        location.reload();

                    },3000);
                       } else {
                            swal("Lỗi", "Đơn Hàng Của Bạn Chưa Được Gửi !!!)", "error");
                              }
                    });
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.add-to-cart').click(function(){
                    var id=$(this).data('id');
                    var cart_product_id = $('.cart_product_id_' + id).val();
                    var cart_product_name = $('.cart_product_name_' + id).val();
                    var cart_product_img = $('.cart_product_img_' + id).val();
                    var cart_product_pricenew = $('.cart_product_pricenew_' + id).val();
                    var cart_product_qty = $('.cart_product_qty_' + id).val();
                    var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                    var cart_product_size = $('.cart_product_size_' + id).val();
                    var cart_product_color = $('.cart_product_color_' + id).val();
                    var _token=$('input[name="_token"]').val();
                    if(parseInt(cart_product_qty) > parseInt(cart_product_quantity)){
                        alert('Số Lượng Sản Phẩm Bạn Đặt Phải Nhỏ Hơn' + cart_product_quantity + 'Sản Phẩm' );
                    }
                    else{
                        $.ajax({
                        url: '{{url('/cart/add-cart-ajax')}}',
                        method:'POST',
                        data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_img:cart_product_img,cart_product_pricenew:cart_product_pricenew,cart_product_qty:cart_product_qty,cart_product_size:cart_product_size ,cart_product_color:cart_product_color,_token:_token,cart_product_quantity:cart_product_quantity},
                        success:function(data){
                            swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{url('/cart/gio-hang')}}";
                            });
                            // alert(data);

                        }
                    });
                    }
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.add-to-wishlist').click(function(){
                    var id=$(this).data('id');
                    var cart_product_id = $('.cart_product_id_' + id).val();
                    var cart_product_name = $('.cart_product_name_' + id).val();
                    var cart_product_img = $('.cart_product_img_' + id).val();
                    var cart_product_pricenew = $('.cart_product_pricenew_' + id).val();
                    var cart_product_qty = $('.cart_product_qty_' + id).val();
                    var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                    var cart_product_size = $('.cart_product_size_' + id).val();
                    var cart_product_color = $('.cart_product_color_' + id).val();
                    var _token=$('input[name="_token"]').val();
                       $.ajax({
                        url: '{{url('/withlist/add-withlist')}}',
                        method:'POST',
                        data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_img:cart_product_img,cart_product_pricenew:cart_product_pricenew,cart_product_qty:cart_product_qty,cart_product_size:cart_product_size ,cart_product_color:cart_product_color,_token:_token,cart_product_quantity:cart_product_quantity},
                        success:function(data){
                            swal({
                                title: "Đã thêm sản phẩm Mục Yêu Thích Thành Công",
                                text: "Bạn có thể mua hàng tiếp hoặc tới mục yêu thích để kiểm tra",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến mục yêu thích",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{url('/withlist/muc-yeu-thich')}}";
                            });
                            // alert(data);

                        }
                    });
                });
            });
        </script>
        <script type="text/javascript">
           $(document).ready(function(){
             $('.choose').on('change',function(){
            var action=$(this).attr('id');
            var ma_id=$(this).val();
            var _token=$('input[name="_token"]').val();
            var $result='';

            if(action=='city'){
                result='province';
            }else{
                result='wards';
            }
            $.ajax({
                url: '{{url('/cart/select-delivery')}}',
                method: 'POST',
                data: {action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                    $('#'+result).html(data);
                }
            });
        });
    });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.calculate_delivery').click(function(){
                var matp=$('.city').val();
                var maqh=$('.province').val();
                var xaid=$('.wards').val();
                var _token=$('input[name="_token"]').val();
                if( matp =='' & maqh =='' &xaid ==''){
                    alert('Làm Ơn Chọn Địa Chỉ Chính XÁc');
                }
                else{
                     $.ajax({
                     url: '{{url('/cart/calculate-free')}}',
                     method: 'POST',
                     data: {matp:matp,maqh:maqh,_token:_token,xaid:xaid},
                     success:function(){
                         location.reload();
                  }
                });
              }
            });
        });

    </script>
    </body>
</html>
