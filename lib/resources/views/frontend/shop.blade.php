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
                                                <li>{{$catename->cate_name}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!--breadcrumbs area end-->

                        <!--pos home section-->
                        <div class=" pos_home_section">
                            <div class="row pos_home">
                                    <div class="col-lg-3 col-md-12">
                                     

                                     

                                        <!--price slider start-->                                     
                                        <div class="sidebar_widget price">
                                            <h2>Price</h2>
                                            <div class="ca_search_filters">

                                                 <p class="p-0 m-0">Giá sản phẩm nhỏ nhất là:       <span id="currentrange">{{number_format($minPrice ,0,',','.')}}VND</span></p>
                                                 <p class="p-0 m-0">Giá sản phẩm lớn nhất là:       <span id="currentrange">{{number_format($maxPrice ,0,',','.')}}VND</span></p>
                                            </div>
                                        </div>                                                       
                                        <!--price slider end-->
                                          <div class="sidebar_widget catrgorie mb-35" >
                                        <h3>Các Danh Mục Khác</h3>
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
                                        <div class="banner_slider mb-35">
                                            <img src="assets\img\banner\bannner10.jpg" alt="">
                                        </div> 
                                        <!--banner slider start-->

                                       

                                        <!--shop tab product-->
                                        <div class="shop_tab_product">   
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="large" role="tabpanel">
                                                    <div class="row">

                                                        @foreach($items as $item)

                                                <div class="col-lg-4 col-md-6">
                                                    <div class="single_product">
                                                        <div class="product_thumb">
                                                           <a href="{{asset('detail/'.$item->prod_id)}}"><img height="320px" width="100%" src="{{asset('public/anhSanPham/'.$item->prod_img)}}" alt=""></a> 
                                                           
                                                           <div class="product_action">
                                                               <a href="{{asset('detail/'.$item->prod_id)}}"> <i class="fa fa-shopping-cart"></i>Mua</a>
                                                           </div>
                                                        </div>
                                                        <div class="product_content">
                                                            <span class="product_price">{{number_format($item->prod_pricenew,0,',','.')}}VND</span>
                                                            <h3 class="product_title"><a href="{{asset('detail/'.$item->prod_id)}}">{{$item->prod_name}}</a></h3>
                                                        </div>
                                                        <div class="product_info">
                                                            <ul>
                                                                <li><a href="{{asset('detail/'.$item->prod_id)}}" title=" Add to Wishlist ">Add to Wishlist</a></li>
                                                                <li><a href="{{asset('detail/'.$item->prod_id)}}" >Chi Tiết</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach                                                      
                                             </div>                                              
                                            </div>
                                        </div>    
                                        <!--shop tab product end-->

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