 @extends('welcome')
@section('content')
 <!--shop tab product-->
                                        <div class="shop_tab_product">   
                                            <div class="tab-content" id="myTabContent">
                                              <h3>Tìm kiếm thành công với từ khóa: <span>{{$keyword}}</span></h3>
                                                <div class="tab-pane fade show active" id="large" role="tabpanel">
                                                    <div class="row">


                                                        @foreach($items as $item)
                                                        
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="single_product">
                                                        <div class="product_thumb">
                                                           <a href="{{asset('detail/'.$item->prod_id)}}"><img height="320px" width="100%" src="{{asset('public/anhSanPham/'.$item->prod_img)}}" alt=""></a> 
                                                           
                                                           <div class="product_action">
                                                               <a href="{{asset('cart/add/'.$item->prod_id)}}"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
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
@stop