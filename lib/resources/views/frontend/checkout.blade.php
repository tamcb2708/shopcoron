@extends('welcome')
@section('content')
@if(Session::has('success'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss='alert' aria-hidden="true">&times;</button>
</div>
@endif
           <!--breadcrumbs area start-->
                        <div class="breadcrumbs_area">
                            <div class="row">
                                <div class="col-12">
                                    <div class="breadcrumb_content">
                                        <ul>
                                            <li><a href="{{asset('/')}}">home</a></li>
                                            <li><i class="fa fa-angle-right"></i></li>
                                            <li>checkout</li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--breadcrumbs area end-->
                        <!--Checkout page section-->
                                   <div class="col-md-12">
                                        <div class="user-actions mb-20">
                                            <h3> 
                                                <i class="fa fa-file-o" aria-hidden="true"></i>
                                                Returning customer?
                                                <a class="Returning" href="#" data-toggle="collapse" data-target="#checkout_login" aria-expanded="true">Click here to login</a>     

                                            </h3>
                                             <div id="checkout_login" class="collapse" data-parent="#accordion">
                                                <div class="checkout_info">
                                                    <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing & Shipping section.</p>  
                                                    <form method="POST">  
                                                        <div class="form_group mb-20">
                                                            <label>Username or email <span>*</span></label>
                                                            <input type="text" id >     
                                                        </div>
                                                        <div class="form_group mb-25">
                                                            <label>Password  <span>*</span></label>
                                                            <input type="text">     
                                                        </div> 
                                                        <div class="form_group group_3 ">
                                                            <input value="Login" type="submit">
                                                            <label for="remember_box">
                                                                <input id="remember_box" type="checkbox">
                                                                <span> Remember me </span>
                                                            </label>     
                                                        </div>
                                                        <a href="#">Lost your password?</a>
                                                    </form>          
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="user-actions mb-20">
                                            <h3> 
                                                <i class="fa fa-file-o" aria-hidden="true"></i>
                                                Returning customer?
                                                <a class="Returning" href="#" data-toggle="collapse" data-target="#checkout_coupon" aria-expanded="true">Click here to enter your code</a>     

                                            </h3>
                                             <div id="checkout_coupon" class="collapse" data-parent="#accordion">
                                                <div class="checkout_info">
                                                    <form method="POST">
                                                        <input placeholder="Coupon code" type="text">
                                                         <input value="Apply coupon" type="submit">
                                                    </form>
                                                </div>
                                            </div>    
                                        </div>    
                                   </div>
                                           @if(Session::has('giohang') && $totalQty >0)
<form action="{{route('postcheckout')}}" method="POST" role="form">                            
                                <div class="container">
                                     <div class="col-md-12">
                             <div class="checkout_form">
                                        <div class="col-md-6">
                                                <h3>Billing Details</h3>
                                                <div class="row">
                                                    <div class="col-12 mb-30">
                                                        <label>First Name and Last Name <span>*</span></label>
                                                        <input required name="name" type="text" id="name">  
                                                    </div>
                                                    <div class="col-12 mb-30">
                                                        <label> Address  <span>*</span></label>
                                                        <input required placeholder="House number and street name" type="text" id="address" name="address" >   
                                                    </div>
                                                    <div class="col-lg-12 mb-30">
                                                        <label>Phone<span>*</span></label>
                                                        <input required id="phone" type="text" name="phone"> 

                                                    </div> 
                                                     <div class="col-lg-12 mb-30">
                                                        <label> Email <span>*</span></label>
                                                          <input id="email" name="email" type="email"> 

                                                    </div> 
                                                     <div class="col-lg-12 mb-30">
                                                        <label for="payment"> Payment <span>*</span></label>
                                                         <select name="payment" id="payment" class="form_group" required="required">
                                                             <option value="0">Giao hang Thanh Toan</option>
                                                             <option value="1">Gaio Hang truc tuyen</option>
                                                         </select>
                                                    </div> 
                         
                                                </div>
                                        </div>
                                         <form>
                                       
                                            <label class="btn btn-primary">Chon Thanh Pho</label>
                                            <select name="city" id="city" class="form-control input-sm m-bot15 choose city" >
                                                <option value=""><<----chon thanh pho---->>></option>
                                                    @foreach($city as $ci)
                                                    <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                                    @endforeach
                                               
                                           </select>
                                            <label class="btn btn-primary">Chon Quan Huyen</label>
                                            <select name="province" id="province" class="form-control input-sm m-bot15 province choose" >
                                                <option value=""><<----chon quan huyen---->>></option>
                                        
                                            </select>
                                            <label class="btn btn-primary">Chon Xa Phuong</label>
                                            <select name="wards" id="wards" class="form-control input-sm m-bot15  wards" >
                                                <option value=""><<----chon xa  phuong---->>></option>
                                            </select>
                                        </div>
                                         <div class="form-group">
                                            <label class="btn btn-primary">Phi Van Chuyen</label>
                                            <input  type="text"  name="fre_ship" class="form-control fre_ship" placeholder="Phi Van Chuyen...">
                                            
                                            <button type="button" name="add_delivery" class="btn btn-info add_delivery"> Them Phi Van Chuyen</button>
                                        </div>
                                        {{csrf_field()}}
                                    </form>
                                       <div class="col-md-6">
                      
                                                <h3>Your order</h3> 
                                                <div class="order_table table-responsive mb-30">
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <th>Product</th>
                                                                <th>Quantity</th>
                                                                <th>Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                              @foreach ($products as $product)
                                                            <tr>
                                                                <td>{{ $product['item']['prod_name'] }}</td>
                                                                <td>{{$product['qty']}}</td>
                                                                <td>{{$product['price']}}</td>
                                                            </tr>
                                                            @endforeach

                                                        </tbody>
                                                        <tfoot>
                                                            <tr class="order_total">
                                                                <th>Order Total</th>
                                                                <th></th>
                                                                <td><strong>{{ $totalPrice }}</strong></td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>     
                                                </div> 
                                        </div>
                                    </div> 
                                </div>
                                </div> 
                       <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button type="submit" name="dat-hang" class="btn btn-success">Order Now!!!</button>

                        <!--Checkout page section end-->               
</form>
@endif
            <!--pos page end-->
@stop