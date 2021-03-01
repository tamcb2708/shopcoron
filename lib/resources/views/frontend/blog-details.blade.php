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
                                            <li>{{$name->bl_name}}</li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--breadcrumbs area end-->
                        
                       <!--blog area start-->
                        <div class="main_blog_area blog_details">
                            <div class="row">
                                    <div class="col-lg-9 col-md-12">
                                        <div class="blog_details_left">
                                            <div class="blog_gallery">   
                                                <div class="blog_header">
                                                    <h2>{{$name->bl_metatitle}}</h2>
                                                    <div class="blog__post">
                                                        <ul>
                                                            <li class="post_author">Posts by : admin</li>
                                                            <li class="post_date">{{$name->created_at}}	</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="">
                                                   <div class="blog_thumb blog__hover">
                                                        <img width="900px" src="{{asset('public/Blog/'.$name->bl_image)}}" alt="">
                                                    </div>
                                                </div>   

                                                <div class="blog_entry_content">
                                                   <p>{!!$name->bl_description!!}</p>

                                                   <p>{!!$name->bl_description1!!}</p>

                                                   <p class="blockquote">{!!$name->bl_descriptionX!!}</p>

                                                   <p>{!!$name->bl_description2!!}</p>

                                                    <p>{!!$name->bl_description3!!}</p>
                                                </div>
                                                <div class="wishlist-share">
                                                <h4>Share on:</h4>
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-rss"></i></a></li>           
                                                    <li><a href="#"><i class="fa fa-vimeo"></i></a></li>           
                                                    <li><a href="#"><i class="fa fa-tumblr"></i></a></li>           
                                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>        
                                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>        
                                                </ul>      
                                            </div>
                                            </div> 
                                             <!--services img area-->
                                           <div class="srrvices_img_area">
                                                <div class="row">
                                                @foreach($blog as $name)
                                                    <div class="col-lg-4">
                                                        <div class="single_img_services mb-20">
                                                            <div class="services_thumb">
                                                                <a href="{{asset('/chi-tiet/blog/'.$name->bl_id)}}"><img src="{{asset('public/Blog/'.$name->bl_image)}}" alt=""></a>
                                                            </div>
                                                            <div class="services_content">
                                                               <h3>{{$name->bl_metatitle}}</h3>
                                                                <div class="tweetlink favorite">
                                                                    <p> {{$name->created_at}} </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                      @endforeach
                                                </div>
                                              

                                           </div>
                                           <!--services img end-->
                                            <div class="comments_area">
                                                <div class="comments__title">
                                                    <h3>Bình Luận </h3>
                                                </div>
                                                <div class="comments__notes">
                                                    <p>Hãy cho chúng tôi biết bạn cảm thấy thế nào</p>
                                                </div>
                                                 <div class="product_review_form blog_form">
                                                    <form method="POST">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label for="review_comment">Bình Luận </label>
                                                                <textarea name="con" id="review_comment"></textarea>
                                                            </div> 
                                                            <div class="col-lg-4 col-md-4">
                                                                <label for="author">Họ Và Tên</label>
                                                                <input id="" type="text" name="nem" required type="nem">

                                                            </div> 
                                                            <div class="col-lg-4 col-md-4">
                                                                <label for="email">Emai </label>
                                                                <input id="email" type="text" name="ema" required type="ema">
                                                            </div> 
                                                        </div>
                                                        <button type="submit">Bình Luận</button>
                                                        {{csrf_field()}}
                                                     </form>   
                                                </div> 
                                            </div>     


                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-8 offset-md-2 offset-lg-0">
                                       <div class="blog_details_right">
                                            
                                            
                                            <div class="blog_widget widget_categoie  mb-30">
                                                <h3>Categories</h3>

                                                <ul>
                                                    @foreach($category as $ca)
                                                    <li><a href="{{asset('category/'.$ca->cate_id)}}">{{$ca->cate_name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="blog_widget widget_recent  mb-30">
                                               <h3>Bản Tin Mới </h3> 
                                                <div class="widget_recent_inner">   
                                                    
                                                    @foreach($blog1 as $name)
                                                   <div class="single_posts">
                                                        <div class="posts_thumb">
                                                            <a href="{{asset('/chi-tiet/blog/'.$name->bl_id)}}"><img src="{{asset('public/Blog/'.$name->bl_image)}}" alt=""></a>
                                                        </div>
                                                        <div class="post_content">
                                                            <span>
                                                                <a class="tweet_author" href="{{asset('/chi-tiet/blog/'.$name->bl_id)}}">{{$name->bl_metatitle}}</a>

                                                            </span>
                                                            <a href="{{asset('/chi-tiet/blog/'.$name->bl_id)}}">{{$name->created_at}}</a>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>         
                                            </div>
                                            <div class="blog_widget widget_recent  mb-30">
                                               <h3>Comments</h3> 
                                                <div class="widget_recent_inner"> 
                                                     @foreach($comment as $com)
                                                   <div class="single_posts">
                                                        <div class="posts_thumb">
                                                        <img src="assets\img\blog\blog12.jpg" alt="">
                                                        </div>
                                                        <div class="post_content">
                                                            <span>
                                                                <p class="tweet_author" >{{$com->comm_content}}</p>

                                                            </span>
                                                            <p>{{$com->created_at}}</p>
                                                        </div>
                                                    </div>
                                                     @endforeach
                                                </div>         
                                            </div>
                                       </div>
                                    </div>
                                </div>
                        </div>
                        <!--blog area end-->
 
                    </div>
                    <!--pos page inner end-->
                </div>
            </div>
            <!--pos page end-->
@stop