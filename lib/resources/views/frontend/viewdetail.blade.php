@extends('welcome')
@section('content')
                        <div class="breadcrumbs_area">
                            <div class="row">
                                <div class="col-12">
                                    <div class="breadcrumb_content">
                                        <ul>
                                            <li><a href="{{(asset('/'))}}">Trang Chủ</a></li>
                                            <li><i class="fa fa-angle-right"></i></li>
                                            <li>Chi Tiết Sản Phẩm</li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--breadcrumbs area end-->


                         <!--product wrapper start-->
                    <form method="POST">
                         {{csrf_field()}}
                         <input type="hidden" value="{{$item->prod_id}}" class="cart_product_id_{{$item->prod_id}}">
                         <input type="hidden" value="{{$item->prod_name}}" class="cart_product_name_{{$item->prod_id}}">
                         <input type="hidden" value="{{$item->prod_img}}" class="cart_product_img_{{$item->prod_id}}">
                         <input type="hidden" value="{{$item->prod_pricenew}}" class="cart_product_pricenew_{{$item->prod_id}}">
                         <input type="hidden" value="{{$item->prod_quantity}}" class="cart_product_quantity_{{$item->prod_id}}">
                        <div class="product_details">
                            <div class="row">
                                    <div class="col-lg-5 col-md-6">
                                        <div class="product_tab fix"> 
                                            <div class="tab-content produc_tab_c">
                                                <div class="tab-pane fade show active" id="p_tab1" role="tabpanel">
                                                    <div class="modal_img">
                                                        <a href=""><img height="400px" width="100%" src="{{asset('public/anhSanPham/'.$item->prod_img)}}" alt=""></a>
                                                        
                                                        <div class="view_img">
                                                            <a class="large_view" href="{{asset('public/anhSanPham/'.$item->prod_img)}}"><i class="fa fa-search-plus"></i></a>
                                                        </div>    
                                                    </div>
                                                </div>

                                            </div>

                                        </div> 
                                    </div>
                                    <div class="col-lg-7 col-md-6">
                                        <div class="product_d_right">
                                            <h1>{{$item->prod_name}}</h1>
                                             <div class="product_ratting mb-10">
                                                <ul class="list-inline" title="Average Rating">
                                                    @for($count=1;$count<=5;$count++)
                                                        @php
                                                           if($count<=$rating){
                                                               $color= 'color:#03fcf0;';
                                                           }
                                                           else{
                                                               $color='color:#ccc;';
                                                           }
                                                        @endphp
                                                        <li title="Đánh giá sao"
                                                         id="{{$item->prod_id}}-{{$count}}"
                                                          data-index="{{$count}}"
                                                           data-product_id="{{$item->prod_id}}"
                                                            data-rating="{{$rating}}"
                                                             class="rating"
                                                              style="cursor:pointer;
                                                              {{$color}} font-size: 30px;
                                                              ">
                                                        &#9733;
                                                        </li>
                                                    @endfor            
                                                 </ul>
                                            </div>
                                            <div class="product_desc">
                                                <p>{!!$item->prod_descripton!!}</p>
                                            </div>

                                            <div class="content_price mb-15">
                                                <span>{{number_format($item->prod_pricenew,0,',','.')}}VND</span>
                                                <span class="old-price">{{number_format($item->prod_price,0,',','.')}}VND</span>
                                            </div>
                                            <div class="box_quantity mb-20">
                                                <form action="#">
                                                    <label>Số Lượng</label>
                                                    <input class="cart_product_qty_{{$item->prod_id}}" min="1" max="100" name="qty" value="1" type="number">
                                                </form> 

                                                <button type="button" class="btn btn-warning add-to-cart" name="add-to-cart" data-id="{{$item->prod_id}}"><i class="fa fa-shopping-cart" ></i><p></p>Thêm Vào Giỏ Hàng</button>

                                                <button type="button" class="add-to-wishlist" name="add-to-wishlist" title="add to wishlist" data-id="{{$item->prod_id}}"><i class="fa fa-heart" aria-hidden="true"></i></button>    
                                            </div>
                                            <div class="product_d_size mb-20">
                                                <label for="group_1">Kích Cỡ</label>
                                                <select style="width: 100px" name="size" id="group_1" class="cart_product_size_{{$item->prod_id}}" name="size">
                                                    <option value="1">Size S</option>
                                                    <option value="2">Size M</option>
                                                    <option value="3">Size L</option>
                                                    <option value="4">Size XL</option>
                                                    <option value="5">Seize XXL</option>
                                                </select>
                                            </div>

                                            <div class="product_d_size mb-20">
                                                <label for="group_1">Màu</label>
                                                <select style="width: 100px" class="cart_product_color_{{$item->prod_id}}" name="mau" id="group_1" name="size">
                                                    <option value="1">Đỏ</option>
                                                    <option value="2">Đen</option>
                                                    <option value="3">Trắng</option>
                                                </select>
                                            </div>              

                                            <div class="product_stock mb-20">
                                               <p>Còn: {{$item->prod_quantity}} Sản Phẩm </p>
                                                <span>@if($item->prod_status==0) Còn Hàng @else Đang Cập Nhập @endif</span>
                                            </div>
                                            <div class="wishlist-share">
                                                <h4>Chia Sẻ:</h4>
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-rss"></i></a></li>           
                                                    <li><a href="#"><i class="fa fa-vimeo"></i></a></li>           
                                                    <li><a href="#"><i class="fa fa-tumblr"></i></a></li>           
                                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>        
                                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>        
                                                </ul>      
                                            </div>

                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!--product details end-->
                    </form>


                        <!--product info start-->
                        <div class="product_d_info">
                            <div class="row">
                                <div class="col-12">
                                    <div class="product_d_inner">   
                                        <div class="product_info_button">    
                                            <ul class="nav" role="tablist">
                                                <li>
                                                    <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Thông Tin Sản Phẩm</a>
                                                </li>
                                                <li>
                                                     <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Dữ Liệu</a>
                                                </li>
                                                <li>
                                                   <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Đánh Giá</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="info" role="tabpanel">
                                                <div class="product_info_content">
                                                    <p>{!!$item->prod_more!!}</p>
                                                </div>    
                                            </div>

                                            <div class="tab-pane fade" id="sheet" role="tabpanel">
                                                <div class="product_d_table">
                                                   <form action="#">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="first_child">Nhà Sáng Chế</td>
                                                                    <td>{{$item->prod_comp}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="first_child">Kiểu Cách</td>
                                                                    <td>{{$item->prod_sty}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="first_child">Phù Hợp</td>
                                                                    <td>{{$item->prod_prop}}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </form>
                                                </div>
                                                <div class="product_info_content">
                                                    <p>{!!$item->prod_more!!}</p>
                                                </div>    
                                            </div>
                                            <div class="tab-pane fade" id="reviews" role="tabpanel">
                                                <div class="product_info_content">
                                                    <p>{!!$item->prod_more!!}</p>
                                                </div>
                                                 @foreach($comments as $comment)
                                                <div class="product_info_inner">
                                                    <div class="product_ratting mb-10">
                                                        <ul class="list-inline" title="Average Rating">
                                                            <li title="Đánh giá sao" id="" data-index=" " data-product_id=" " data-rating="" class="rating" style="cursor: pointer;color: #ccc;font-style: 30px;">&#9733;
                                                            </li>
                                                        </ul>
                                                        <strong> {{$comment->com_name}}</strong> 
                                                        <p>{{date('d/m/Y H:i',strtotime($comment->created_at))}}</p>
                                                    </div>
                                                    <div class="product_demo">
                                                        <strong>{{$comment->com_email}}</strong>
                                                        <p>{{$comment->com_content}}</p>
                                                    </div>
                                                </div> 
                                                @endforeach
                                                <hr>
                                                <div class="product_review_form">
                                                     <form  method="post">
                                                        <div class="row">
                                                             <h2>Thêm Đánh Giá Của Bạn</h2>
                                                             (<p>Đánh giá bằng email và tên của bạn</p>)
                                                            <div class="col-12">
                                                                <label for="review_comment">Bình Luận của bạn </label>
                                                                <textarea name="content" id="review_comment"></textarea>
                                                            </div> 
                                                            <div class="col-lg-4 col-md-4">
                                                                <label for="author">Tên của bạn</label>
                                                                <input required type="name" class="form-control" id="name" name="name">
                                                            </div> 
                                                            <div class="col-lg-4 col-md-4">
                                                                <label for="email">email của bạn </label>
                                                                 <input required type="email" class="form-control" id="email" name="email">
                                                            </div>
                                                        </div>
                                                        <button type="submit">Đăng</button>
                                                        {{csrf_field()}}
                                                     </form>  
                                                </div>     
                                            </div>
                                        </div>
                                    </div>     
                                </div>
                            </div>
                        </div>  
                        <!--product info end-->


                        <!--new product area start-->
                        <div class="new_product_area product_page">
                            <div class="row">
                                <div class="col-12">
                                    <div class="block_title">
                                    <h3>Các Sản Phẩm Khác Trong Danh Mục:</h3>
                                </div>
                                </div> 
                            </div>
                                                                <div class="row">
                                                        @foreach($relate as $item)
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


                        <!--new product area start-->
                        <div class="new_product_area product_page">
                            <div class="row">
                                <div class="col-12">
                                    <div class="block_title">
                                    <h3>Sản Phẩm Đang Hot</h3>
                                </div>
                                </div> 
                            </div>
                          
                                                                <div class="row">
                                                        @foreach($product as $item)
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
                        <!--new product area start-->  
        

@stop