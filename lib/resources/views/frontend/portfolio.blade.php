@extends('welcome')
@section('content')
   <div class="breadcrumbs_area">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="breadcrumb_content">
                                            <ul>
                                                <li><a href="index.html">home</a></li>
                                                <li><i class="fa fa-angle-right"></i></li>
                                                <li>portfolio</li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--breadcrumbs area end-->

                        <!--portfolio section -->
                        <div class="portfolio_section_area">
                            <div class="portfolio_button">   
                                <div class="row">
                                        <div class="col-12">

                                            <button class="active" data-filter="*">all</button>   

                                        </div>
                                    </div>
                            </div>            
                            <div class="row portfolio_gallery">  
                                <div class="col-lg-3 col-md-4 col-sm-6 gird_item computers general">
                                   <div class="single_portfolio_inner">
                                        <div class="portfolio_thumb">
                                            <a href="#"><img src="assets\img\portfolio\port1.jpg" alt=""></a>
                                            <div class="portfolio_popup">
                                                <a class="port_popup" href="assets\img\portfolio\port1.jpg"><i class="fa fa-search"></i></a>
                                            </div>
                                            <div class="portfolio_link">
                                                <a href="portfolio-details.html"><i class="fa fa-link"></i></a>
                                            </div>
                                        </div>
                                        <div class="portfolio__content">
                                            <a href="portfolio-details.html">Coffee & Cookie Time</a>
                                            <span>admin</span>
                                        </div>
                                   </div>

                                </div>

                            </div>
                        </div>
                        <!--portfolio section end-->
@stop