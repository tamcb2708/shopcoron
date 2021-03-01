@extends('welcome')
@section('content')
        <!--breadcrumbs area start-->
        <script type="text/javascript">
            function updateCart(qty,prod_id){
                $.get(
                    '{{asset('cart/update')}}',
                    {qty:qty,prod_id:prod_id},
                    function(){
                        location.reload();
                    }
                    );
            }
        </script>
        @if(Session::has('giohang') && $totalQty >0)

                         <!--shopping cart area start -->
                        <div class="shopping_cart_area">
                            <form  method="post"> 
                                    <div class="row">

                                        <div class="col-12">
                                            <div class="table_desc">
                                                <div class="cart_page table-responsive">
                                                    <table>
                                                <thead>
                                                    <tr>
                                                        <th class="product_remove">Delete</th>
                                                        <th class="product_thumb">Image</th>
                                                        <th class="product_name">Product</th>
                                                        <th class="product-price">Price</th>
                                                        <th class="product_quantity">Quantity</th>
                                                        <th class="product_total">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($products as $product)
                                                   
                                                    <tr>
                                                       <td class="product_remove"><a href="{{ asset('cart/delete/'.$product['item']['prod_id']) }}"><i class="fa fa-trash-o"></i></a></td>
                                                        <td class="product_thumb"><a href="#"><img src="{{ asset('/public/anhSanPham/'.$product['item']['prod_img']) }}" alt=""></a></td>
                                                        <td class="product_name"><a href="#">{{ $product['item']['prod_name'] }}</a></td>
                                                        <td class="product-price">{{$product['item']['prod_pricenew']}}</td>
                                                        <td class="product_quantity">
                                                            <input min="1" max="100" value="{{$product['qty']}}" type="number" onchange="updateCart(this.value,
                                                            '{{$product['item']['prod_id']}}')"></td>

                                                        <td class="product_total"><p>{{$product['price']}}</p></td>


                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>   
                                                </div>  
                                                <div class="cart_submit">
                                                    <p>{{ $totalQty }} san pham</p>
                                                </div>      
                                            </div>
                                         </div>
                                     </div>
                                     <!--coupon code area start-->
                                    <div class="coupon_area">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="coupon_code">
                                                    <h3>Coupon</h3>
                                                    <div class="coupon_inner">   
                                                        <p>Enter your coupon code if you have one.</p>                                
                                                        <input placeholder="Coupon code" type="text">
                                                        <button type="submit">Apply coupon</button>
                                                    </div>    
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="coupon_code">
                                                    <h3>Cart Totals</h3>
                                                    <div class="coupon_inner">
                                                    

                                                       <div class="cart_subtotal">
                                                           <p>Total</p>
                                                           <p class="cart_amount">{{ $totalPrice }}</p>
                                                       </div>
                                                       <div class="checkout_btn">
                                                           <a href="{{asset('checkout')}}">Proceed to Checkout</a>
                                                       </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                                           
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input name="name" placeholder="Name *" type="text">    
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input name="email" placeholder="Email *" type="email">    
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input name="subject" placeholder="Subject *" type="text">   
                                                    </div>
                                                     <div class="col-lg-6">
                                                        <input name="phone" placeholder="Phone *" type="text">   
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="contact_textarea">
                                                        <textarea placeholder="Message *" name="message" class="form-control2"></textarea>     
                                                        </div>   
                                                        <div class="form-group text-right">                                             <button class="btn bn-default" type="submit"> Send Message </button> 
                                                        </div> 
                                                    </div> 
                                                    <div class="col-12">
                                                        <p class="form-messege"></p>
                                                    </div>
                                                      {{csrf_field()}}
                                                  </div>
                                              
                                          </div>
                                          </form>


                              
                                @else
                         <h1>gio hang rong</h1>
                         </div>
                         <!--shopping cart area end -->


                         @endif

                    </div>
                    <!--pos page inner end-->
                </div>
            </div>
            <!--pos page end-->
        
@stop

            <!--pos page end-->
