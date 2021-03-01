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
                                            <li>Các Bài Viết</li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--breadcrumbs area end-->
                        
                        <!--blog area start-->
                        <div class="blog_area">
                            <div class="row">  
                            @foreach($blog as $bl) 
                                <div class="col-lg-4 col-md-6">
                                    <div class="single_blog">
                                        <div class="blog_thumb">
                                            <a href="{{asset('chi-tiet/blog/'.$bl->bl_id)}}"><img width="400px" height="200px" src="{{asset('public/Blog/'.$bl->bl_image)}}" alt=""></a>
                                        </div>
                                        <div class="blog_content">
                                            <div class="blog_post">
                                                <ul>
                                                    <li>
                                                        <a href="{{asset('chi-tiet/blog/'.$bl->bl_id)}}">{{$bl->bl_metatitle}}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h3><a href="{{asset('chi-tiet/blog/'.$bl->bl_id)}}">{{$bl->bl_name}}</a></h3>
                                            <p>{!!$bl->bl_description!!}</p>
                                            <div class="post_footer">
                                                <div class="post_meta">
                                                    <ul>
                                                        <li>{{$bl->created_at}}</li>
                                                    </ul>
                                                </div>
                                                <div class="Read_more">
                                                    <a href="{{asset('chi-tiet/blog/'.$bl->bl_id)}}">Đọc Thêm<i class="fa fa-angle-double-right"></i></a>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>    
                        </div>
                        <!--blog area end-->
                        
                        <!--pagination style start--> 
                                       <div class="pagination_style">
                                            
                                            <div class="page_number">
                                                <span>Số Trang: </span>
                                                <ul>
                                                {{$items->links()}}
                                                </ul>
                                            </div>
                                        </div>
                        <!--pagination style end--> 
                        
                        <!--brand logo strat--> 
                        <div class="brand_logo brand_about">
                            <div class="block_title">
                                <h3>Thương Hiệu</h3>
                            </div>
                            <div class="row">
                                <div class="">
                                    @foreach($brand as $bra)
                                    <a href="{{asset('chi-tiet/'.$bra->bra_id)}}"><img src="{{asset('public/Brand/'.$bra->bra_image)}}" alt=""></a>
                                    @endforeach
                                </div>
                            </div>
                        </div>       
                        <!--brand logo end-->   
                    </div>
                    <!--pos page inner end-->
                </div>
            </div>
            <!--pos page end-->
@stop