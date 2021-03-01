@extends('welcome')
@section('content')
                        <div class="breadcrumbs_area">
                            <div class="row">
                                <div class="col-12">
                                    <div class="breadcrumb_content">
                                        <ul>
                                            <li><a href="{{asset('/')}}">Trang Chủ</a></li>
                                            <li><i class="fa fa-angle-right"></i></li>
                                            <li>Sản Phẩm</li>
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
                                       <!--layere categorie"-->
                                          <div class="sidebar_widget shop_c">
                                                <div class="categorie__titile">
                                                    <h4>Danh Mục Sản Phẩm</h4>
                                                </div>
                                                <div class="layere_categorie">
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
                                            </div>
                                        <!--layere categorie end-->

                                        <!--color area start-->  
<!--                                         <div class="sidebar_widget color">
                                            <h2>Color</h2>
                                             <div class="widget_color">
                                                <ul>

                                                    <li><a href="#">Black <span>(10)</span></a></li>

                                                </ul>
                                            </div>
                                        </div>               -->   
                                        <!--color area end--> 

                                        <!--price slider start-->                                     
                                        <div class="sidebar_widget price">
                                            <h2>Price</h2>
                                            <div class="ca_search_filters">

                                                <input type="text" name="text" id="amount">  
                                                <div id="slider-range"></div> 
                                            </div>
                                        </div>                                                       
                                        <!--price slider end-->
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
                                        <!--wishlist block end-->
                                    </div>
                                    <div class="col-lg-9 col-md-12">
                                        <!--banner slider start-->
                                        <div class="banner_slider mb-35">
                                            <img src="assets\img\banner\bannner10.jpg" alt="">
                                        </div> 
                                        <!--banner slider start-->

                                        <!--shop toolbar start-->
                                        <div class="shop_toolbar list_toolbar mb-35">
                                            <div class="list_button">
                                                <ul class="nav" role="tablist">
                                                    <li>
                                                        <a data-toggle="tab" href="#large" role="tab" aria-controls="large" aria-selected="true"><i class="fa fa-th-large"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="active" data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="false"><i class="fa fa-th-list"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="select_option">
                                                <form action="#">
                                                    <label>Sắp Xếp</label>
                                                    <select name="orderby" id="short">
                                                        <option selected="" value="1">Position</option>
                                                        <option value="1">Price: Lowest</option>
                                                        <option value="1">Price: Highest</option>
                                                        <option value="1">Product Name:Z</option>
                                                        <option value="1">Sort by price:low</option>
                                                        <option value="1">Product Name: Z</option>
                                                        <option value="1">In stock</option>
                                                        <option value="1">Product Name: A</option>
                                                        <option value="1">In stock</option>
                                                    </select>
                                                </form>
                                            </div>
                                        </div>
                                        <!--shop toolbar end-->

                                        <!--shop tab product-->
                                        <div class="shop_tab_product">   
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade " id="large" role="tabpanel">
                                                    <div class="row">
                                                        @foreach($sanpham as $item)
                                                          <input type="hidden" value="{{$item->prod_id}}" class="cart_product_id_{{$item->prod_id}}">
                         <input type="hidden" value="{{$item->prod_name}}" class="cart_product_name_{{$item->prod_id}}">
                         <input type="hidden" value="{{$item->prod_img}}" class="cart_product_img_{{$item->prod_id}}">
                         <input type="hidden" value="{{$item->prod_pricenew}}" class="cart_product_pricenew_{{$item->prod_id}}">
                         <input type="hidden" value="{{$item->prod_quantity}}" class="cart_product_quantity_{{$item->prod_id}}">
                                                        @csrf
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
                                                               <button type="button" class="add-to-wishlist" name="add-to-wishlist" title="add to wishlist" data-id="{{$item->prod_id}}"><i class="fa fa-heart" aria-hidden="true"></i></button> 
                                                                <li><a href="{{asset('detail/'.$item->prod_id)}}" >Chi Tiết</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                        @endforeach
                                                    </div>  
                                                </div>
                                                <div class="tab-pane fade show active" id="list" role="tabpanel">
                                                    @foreach($chitiet as $item)
                                                                                                <input type="hidden" value="{{$item->prod_id}}" class="cart_product_id_{{$item->prod_id}}">
                         <input type="hidden" value="{{$item->prod_name}}" class="cart_product_name_{{$item->prod_id}}">
                         <input type="hidden" value="{{$item->prod_img}}" class="cart_product_img_{{$item->prod_id}}">
                         <input type="hidden" value="{{$item->prod_pricenew}}" class="cart_product_pricenew_{{$item->prod_id}}">
                         <input type="hidden" value="{{$item->prod_quantity}}" class="cart_product_quantity_{{$item->prod_id}}">
                                                        @csrf
                                                    <div class="product_list_item mb-35">
                                                        <div class="row align-items-center">
                                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                                <div class="product_thumb">
                                                                   <a href="{{asset('detail/'.$item->prod_id)}}"><img height="320px" width="100%" src="{{asset('public/anhSanPham/'.$item->prod_img)}}" alt=""></a> 
                                                                  
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-8 col-md-6 col-sm-6">
                                                                <div class="list_product_content">
                                                                   <div class="product_ratting">
                                                                       <ul>
                                                                           <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                                           <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                                           <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                                           <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                                           <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                                       </ul>
                                                                   </div>
                                                                    <div class="list_title">
                                                                        <h3><a href="{{asset('detail/'.$item->prod_id)}}">{{$item->prod_name}}</a></h3>
                                                                    </div>
                                                                    <p class="design">{!!$item->prod_descripton!!}</p>

                                                                    <p class="compare">
                                                                        <input id="select" type="checkbox">
                                                                        <label for="select">Select to compare</label>
                                                                    </p>
                                                                    <div class="content_price">
                                                                        <span>{{number_format($item->prod_pricenew,0,',','.')}}VND</span>
                                                                        <span class="old-price">{{number_format($item->prod_price,0,',','.')}}VND</span>
                                                                    </div>
                                                                    <div class="add_links">
                                                                        <ul>
                                                                            <li><a href="{{asset('detail/'.$item->prod_id)}}" title="add to cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>

                                                                            <li><button type="button" class="add-to-wishlist" name="add-to-wishlist" title="add to wishlist" data-id="{{$item->prod_id}}"><i class="fa fa-heart" aria-hidden="true"></i></button> </li>

                                                                            <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
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
                                                <span>Pages: </span>
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
@stop