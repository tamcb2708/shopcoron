@extends('welcome')
@section('content')
@if(Session::get('withlist')==true)
                         <!--shopping cart area start -->
                       @if(session()->has('message'))
                           <div class="alert alert-success">
                             {!!session()->get('message')!!}
                           </div>
                       @else(session()->has('error'))
                            <div class="alert alert-success">
                             {!!session()->get('error')!!}
                           </div>
                       @endif
               <!--breadcrumbs area start-->
               <div class="breadcrumbs_area">
                            <div class="row">
                                <div class="col-12">
                                    <div class="breadcrumb_content">
                                        <ul>
                                            <li><a href="{{asset('/')}}}">Trang Chủ</a></li>
                                            <li><i class="fa fa-angle-right"></i></li>
                                            <li>Mục Yêu Thích</li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--breadcrumbs area end-->

                         <!--shopping cart area start -->
                        <div class="shopping_cart_area">
                               <form action="#"> 
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table_desc wishlist">
                                                <div class="cart_page table-responsive">
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <th class="product_remove">Xóa</th>
                                                                <th class="product_thumb">Ảnh Sản Phẩm</th>
                                                                <th class="product_name">Tên Sản Phẩm</th>
                                                                <th class="product-price">Giá Tiền</th>
                                                                <th>Số Lượng Đang Còn</th>
                                                                <th class="product_total">Chức Năng</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                              @csrf
                                                @php
                                                   $total=0;
                                                @endphp
                                                @foreach(Session::get('withlist') as $withlist)
                                               
                                                            <tr>
                                                               <td class="product_remove"><a href="{{asset('withlist/delete-withlist/'.$withlist['session_id'])}}">X</a></td>
                                                                <td class="product_thumb"><a href="{{asset('detail/'.$withlist['product_id'])}}"><img width="200px;" height="200px;" src="{{ asset('/public/anhSanPham/'.$withlist['product_img']) }}" alt=""></a></td>
                                                                <td class="product_name"><a href="{{asset('detail/'.$withlist['product_id'])}}">{{$withlist['product_name']}}</a></td>
                                                                <td class="product-price">{{number_format($withlist['product_pricenew'],0,',','.')}}VND</td>
                                                                <td>{{$withlist['product_quantity']}} Sản Phẩm</td>
                                                                <td class="product_total"><a href="{{asset('detail/'.$withlist['product_id'])}}" title="add to cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></td>


                                                            </tr>
                                                @endforeach   

                                                        </tbody>
                                                    </table>   
                                                </div>  

                                            </div>
                                         </div>
                                     </div>

                                </form> 
                                <div class="row">
                                    <div class="col-12">
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
                                </div>

                         </div>
                         <!--shopping cart area end -->

                    </div>
                    <!--pos page inner end-->
                </div>
            </div>
            <!--pos page end-->
@else
          <div class="error_section">
                            <div class="row">
                                <div class="col-12">
                                    <div class="error_form">
                                        <h1>Mục Yêu Thích Trống</h1>
                                        <h2>Hãy chọn thêm sản phẩm vào mục yêu thích của bạn</h2>
                                        <p>Tìm Kiếm Sản Phẩm</p>
                                        <form  method="get" role="search" action="{{asset('search/')}}">
                                            <input placeholder="Nhập từ khóa tìm kiếm..." type="text">
                                            <button type="submit"><i class="fa fa-search"></i></button>
                                        </form>
                                        <a href="{{asset('/shopone')}}">Quay trở lại Cửa Hàng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--error section area end-->   
                    </div>
                    <!--pos page inner end-->
                </div>
            </div>
@endif
@stop           