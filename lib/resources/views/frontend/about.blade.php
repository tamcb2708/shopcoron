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
                                            <li>Giới Thiệu</li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--breadcrumbs area end-->
                         <!--about section area -->
                        <div class="about_section">
                            <div class="row align-items-center">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="about_thumb">
                                            <img src="assets\img\ship\about1.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="about_content">
                                            <h1>Chúng Tôi<br>Tuấn Tâm IT</h1>
                                            <p>Tuấn Tâm IT, Thằng cháu phế vật của tập đoàn vinaconex. Người đã thi đậu vào bách khoa nhưng lại đéo muốn học ở đó và quay lại về trường học và làm việc tại trường. Hiện tại anh là trợ giảng ở Bách Khoa Apect và đang thực tập 2 tháng ở đó. Học 3 năm IELTS mà chưa nổi 5.0 IELTS vì lý do nghỉ nhiều vãi cả lồn </p>
                                            <p>Công ty chúng tôi với hơn 2000 nhân viên và hơn 4000 thành viên trên các trang mạng</p>
                                            
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!--about section end-->


                        <!--counterup area -->
                        <div class="counterup_section">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="single_counterup">
                                           <div class="counter_img">
                                                <img src="assets\img\cart\count.png" alt="">
                                            </div>
                                            <div class="counter_info">
                                                <h2 class="counter_number">2170</h2>
                                                <p>Thành Viên</p>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="single_counterup count-two">
                                            <div class="counter_img">
                                                <img src="assets\img\cart\count2.png" alt="">
                                            </div>
                                            <div class="counter_info">
                                                <h2 class="counter_number">8</h2>
                                                <p>Giải Thưởng</p>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="single_counterup">
                                            <div class="counter_img">
                                                <img src="assets\img\cart\count3.png" alt="">
                                            </div>
                                            <div class="counter_info">
                                                <h2 class="counter_number">2150</h2>
                                                <p>Giờ Làm Việc</p>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="single_counterup count-two">
                                            <div class="counter_img">
                                                <img src="assets\img\cart\cart5.png" alt="">
                                            </div>
                                            <div class="counter_info">
                                                <h2 class="counter_number">21</h2>
                                                <p>Sản Phẩm Sáng Tạo</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!--counterup end-->

                        <!--about progress bar -->
                        <div class="about_progressbar">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-6">
                                    <div class="progressbar_inner">
                                       <h2>Chúng tôi sẽ thể hiện biểu đồ doanh thu của chúng tôi sauu đây</h2>
                                        <div class="progress_skill">
                                            <div class="progress">
                                                <div class="progress-bar about_prog wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay=".3s" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="progress_persent">Sản phẩm Bán Được Hàng Tháng</span>    
                                                </div>
                                            </div>
                                            <span class="progress_discount">60%</span>
                                        </div>
                                        <div class="progress_skill">
                                            <div class="progress">
                                                <div class="progress-bar about_prog wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay=".5s" role="progressbar" style="width: 90%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">

                                                    <span class="progress_persent">Công Nghê Laravel 7x </span>
                                                </div>

                                            </div>
                                             <span class="progress_discount">90%</span>
                                        </div> 
                                        <div class="progress_skill">
                                            <div class="progress">
                                                <div class="progress-bar about_prog wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay=".7s" role="progressbar" style="width: 20%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">

                                                    <span class="progress_persent">Công Nghệ Jquejy  </span>
                                                </div>

                                            </div>
                                             <span class="progress_discount">20%</span>
                                        </div> 
                                         <div class="progress_skill">
                                            <div class="progress">
                                                <div class="progress-bar about_prog wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay=".7s" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">

                                                    <span class="progress_persent">Khách Hàng Yêu Thích Chúng Tôi  </span>
                                                </div>

                                            </div>
                                             <span class="progress_discount">80%</span>
                                        </div> 
                                    </div>           
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="about__img">
                                        <img src="assets\img\ship\about3.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--about progress bar end -->
                        
                        <!--brand logo strat--> 
                        <div class="brand_logo brand_about">
                            <div class="block_title">
                                <h3>Các Thương Hiệu</h3>
                            </div>
                            <div class="row">
                                @foreach($brand as $bra)
                                        <div class="single_brand">
                                            <a href="{{asset('chi-tiet-thuong-hieu/'.$bra->bra_id)}}"><img src="{{asset('public/Brand/'.$bra->bra_image)}}" alt=""></a>
                                        </div>
                                @endforeach
                            </div>
                        </div>       
                        <!--brand logo end-->  
                    </div>
                    <!--pos page inner end-->
                </div>
            </div>
            <!--pos page end-->
@stop