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
                                            <li>Liên Hệ</li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--breadcrumbs area end-->

                        <!--contact area start-->
                        <div class="contact_area">
                            <div class="row">
                                   <div class="col-lg-6 col-md-12">
                                       <div class="contact_message">
                                            <h3>Hãy Để Coron Hiểu Được Bạn</h3>   
                                            <form  method="post" >
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input name="name" required placeholder="Tên Của Bạn *" type="text">    
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input name="email" required  placeholder="Email Của Bạn *" type="email">    
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input name="subject" required  placeholder="Tiêu Đề *" type="text">   
                                                    </div>
                                                     <div class="col-lg-6">
                                                        <input name="phone" required  placeholder="Số Điện Thoại Của Bạn *" type="text">   
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="contact_textarea">
                                                            <textarea required  placeholder="Lời Nhắn *" name="message" class="form-control2"></textarea>     
                                                        </div>   
                                                        <button type="submit" id="btn"> Gửi </button> 
                                                        <script language="javascript">
            var button = document.getElementById("btn");
            button.onclick = function(){
                swal("Cảm Ơn Bạn Đã Liên Hệ Với Coron. Coron xin được phục vụ bạn!");
                  window.setTimeout(function(){
                        location.reload();

                    },3000);
            }
        </script>

                                                    </div> 
                                                    <div class="col-12">
                                                        <p class="form-messege">
                                                    </div>
                                                </div>
                                                {{csrf_field()}}
                                            </form>    
                                        </div> 
                                   </div>
                                  
                                   <div class="col-lg-6 col-md-12">
                                       <div class="contact_message contact_info">
                                            <h3>Coron</h3>    
                                             <p>Trang web Coron Được làm trong 9 ngày liên tục của Bậc Thầy IT Nguyễn Tuấn Tâm.Trang web Coron Được làm trong 9 ngày liên tục của Bậc Thầy IT Nguyễn Tuấn Tâm.
                                             Trang web Coron Được làm trong 9 ngày liên tục của Bậc Thầy IT Nguyễn Tuấn Tâm.</p>
                                            <ul>
                                                <li><i class="fa fa-fax"></i>  địa chỉ : Số 32 Phan Văn Trường Cầu Giấy</li>
                                                <li><i class="fa fa-phone"></i><a href="tel:0355978258">+0355 978 258</a></li>
                                                <li><i class="fa fa-phone"></i><a href="tel:0982374911">+0982 374 911</a></li>
                                                <li><i class="fa fa-envelope-o"></i><a href="mailto:tamcb2708@gmail.com">tamcb2708@gmail.com</a></li>
                                            </ul>        
                                            <h3><strong>Thời Gian Làm Việc</strong></h3>
                                            <p><strong>Thứ Hai – Thứ Bảy</strong>:  08AM – 22PM</p>       
                                        </div> 
                                   </div>
                               </div>
                        </div>

                        <!--contact area end-->
                        
                        <!--contact map start-->
                        <div class="contact_map">
                            <div class="row">
                                <div class="col-12">
                                    <iframe src="https://www.google.com/maps/embed?pb" width="500" height="450" style="border:0" allowfullscreen=""></iframe>
                                </div>
                            </div>
                        </div>
                        <!--contact map end-->


                    </div>
                    <!--pos page inner end-->
                </div>
            </div>
            <!--pos page end-->
@stop