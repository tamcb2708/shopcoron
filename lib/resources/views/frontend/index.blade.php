@extends('welcome')
@section('content')
	<!--pos home section-->
    
	<div class=" pos_home_section">
                            <div class="row pos_home">
                                <div class="col-lg-3 col-md-8 col-12">
                                   <!--sidebar banner-->
                                    <div class="sidebar_widget banner mb-35">
                                        <div class="banner_img mb-35">
                                            <a href="{{asset('category/1')}}"><img src="assets\img\banner\banner5.jpg" alt=""></a>
                                        </div>
                                        <div class="banner_img">
                                            <a href="{{asset('category/2')}}"><img src="assets\img\banner\banner6.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <!--sidebar banner end-->

                                    <!--categorie menu start-->
                                    <div class="sidebar_widget catrgorie mb-35" >
                                        <h3>Danh Mục Sản Phẩm</h3>
                                        @foreach($category as $cate )
                                        <ul>
                                            <li class="has-sub"><a href="{{asset('category/'.$cate->cate_id)}}"><i class="fa fa-caret-right"></i> {{$cate->cate_name}}</a>
                                                <ul class="categorie_sub">
                                            
                                                      <li><a href="{{asset('category/'.$cate->cate_id)}}"><i class="fa fa-caret-right"></i>{{$cate->cate_name}}</a></li>
                                                </ul>     
                                            </li>                                           
                                        </ul>
                                        @endforeach
                                    </div>
                                    
                                    <!--categorie menu end-->

                                    <!--newsletter block start-->
                                    <div class="sidebar_widget newsletter mb-35">
                                        <div class="block_title">
                                            <h3>Nhập Email</h3>
                                        </div> 
                                        <form method="post">
                                            <p>Nhập email để nhận thông báo từ chúng tôi</p>
                                            <input name="email" placeholder="email của bạn" type="email">
                                            <button  type="submit">Theo Dõi</button>
                                            {{csrf_field()}}
                                        </form>   
                                    </div>
                                   
                                    <!--newsletter block end--> 

                                    <!--sidebar banner-->
                                    <div class="sidebar_widget bottom ">
                                        <div class="banner_img">
                                            <a href="{{asset('category/1')}}"><img src="assets\img\banner\banner9.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <!--sidebar banner end-->
                                    <hr>

                                    @if(Session::get('withlist')==true)
                                        <!--wishlist block start-->
                                        <div class="sidebar_widget wishlist mb-30">
                                             @foreach(Session::get('withlist') as $withlist)
                                                              <!--wishlist block start-->
                                        <div class="cart_item">
                                           <div class="cart_img">
                                               <a href="{{asset('detail/'.$withlist['product_id'])}}"><img  width="50px;" height="50px;" src="{{ asset('/public/anhSanPham/'.$withlist['product_img']) }}" alt=""></a>
                                           </div>
                                            <div class="cart_info">
                                                <a href="{{asset('detail/'.$withlist['product_id'])}}">{{$withlist['product_name']}}</a>
                                                <span class="cart_price">{{number_format($withlist['product_pricenew'],0,',','.')}}VND</span>
                                                <span class="quantity">Qty: {{$withlist['product_quantity']}} Sản Phẩm</span>
                                            </div>
                                            <div class="cart_remove">
                                                <a title="Remove this item" href="{{asset('withlist/delete-withlist/'.$withlist['session_id'])}}"><i class="fa fa-times-circle"></i></a>
                                            </div>
                                        </div>
                                    <!--wishlist block end-->
                                            @endforeach
                                        </div>
                                    @endif



                                </div>
                                <div class="col-lg-9 col-md-12">
                                    <!--banner slider start-->
                                    
                                    <div class=" ">
                                        
                                        <div class=" ">
                                            @foreach($slide as $sli)
                                            <img src="{{asset('public/Slidebar/'.$sli->sli_image)}}">
                                            @endforeach 
                                        </div>
                                         
                                        
                                    </div>                                   
                                    <!--banner slider start-->
<hr>
                                    <!--new product area start-->
                                    <div class="new_product_area">
                                        <div class="block_title">
                                            <h3>Sản Phẩm Mới</h3>
                                        </div>
                                                   <div class="row">
                                                        @foreach($featuredproduct as $item)
                                                        <div class="col-lg-4 col-md-6">
                                                    <div class="single_product">
                                                        <div class="product_thumb">
                                                           <a href="{{asset('detail/'.$item->prod_id)}}"><img height="320px" width="100%" src="{{asset('public/anhSanPham/'.$item->prod_img)}}" alt=""></a> 
                                                           
                                                           <div class="product_action">
                                                               <a href="{{asset('detail/'.$item->prod_id)}}"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                           </div>
                                                        </div>
                                                        <div class="product_content">
                                                            <span class="product_price">{{number_format($item->prod_pricenew,0,',','.')}}VND</span>
                                                            <h3 class="product_title"><a href="{{asset('detail/'.$item->prod_id)}}">{{$item->prod_name}}</a></h3>
                                                        </div>
                                                        <div class="product_info">
                                                            <ul>
                                                                <li><a href="{{asset('detail/'.$item->prod_id)}}" title=" Add to Wishlist ">Add to Wishlist</a></li>
                                                                <li><a href="{{asset('detail/'.$item->prod_id)}}" >View Detail</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                        @endforeach
                                                    </div>  

                                    </div> 
                                    <!--new product area start--> 
                                    <!--featured product start--> 
                                    <div class="featured_product">
                                        <div class="block_title">
                                            <h3>Sản Phẩm Đang Hot !!!</h3>
                                        </div>
                                         <div class="row">
                                                        @foreach($featuredproduct as $item)
                                                        <div class="col-lg-4 col-md-6">
                                                    <div class="single_product">
                                                        <div class="product_thumb">
                                                           <a href="{{asset('detail/'.$item->prod_id)}}"><img height="320px" width="100%" src="{{asset('public/anhSanPham/'.$item->prod_img)}}" alt=""></a> 
                                                           
                                                           <div class="product_action">
                                                               <a href="{{asset('detail/'.$item->prod_id)}}"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                           </div>
                                                        </div>
                                                        <div class="product_content">
                                                            <span class="product_price">{{number_format($item->prod_pricenew,0,',','.')}}VND</span>
                                                            <h3 class="product_title"><a href="{{asset('detail/'.$item->prod_id)}}">{{$item->prod_name}}</a></h3>
                                                        </div>
                                                        <div class="product_info">
                                                            <ul>
                                                                <li><a href="{{asset('detail/'.$item->prod_id)}}" title=" Add to Wishlist ">Add to Wishlist</a></li>
                                                                <li><a href="{{asset('detail/'.$item->prod_id)}}" >View Detail</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                        @endforeach
                                                    </div>  
                                    </div>     
                                    <!--featured product end--> 

                                    <!--banner area start-->
                                    <div class="banner_area mb-60">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single_banner">
                                                    <a href="{{asset('errors')}}"><img src="assets\img\banner\banner7.jpg" alt=""></a>
                                                    <div class="banner_title">
                                                        <p>Up to <span> 40%</span> off</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single_banner">
                                                    <a href="{{asset('errors')}}"><img src="assets\img\banner\banner8.jpg" alt=""></a>
                                                    <div class="banner_title title_2">
                                                        <p>sale off <span> 30%</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>     
                                    <!--banner area end-->

                                    <!--brand logo strat--> 
                                    <div class=" mb-60">
                                        <div class="block_title">
                                            <h3>Thương Hiệu</h3>
                                        </div>
                                        @foreach($brand as $bra)
                                                        <a href="{{asset('chi-tiet-thuong-hieu/'.$bra->bra_id)}}"><img src="{{asset('public/Brand/'.$bra->bra_image)}}" alt=""></a>
 
                                                @endforeach
                                    </div>
                                    <!--brand logo end-->        
                                </div>
                            </div>  
                        </div>
                        <!--pos home section end-->
                    </div>
                    <!--pos page inner end-->
                </div>
            </div>
            <!--pos page end-->
@stop