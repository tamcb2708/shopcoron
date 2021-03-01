<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Mail;
use App\Cart;
use Session;
use DB;
use App\Models\Coupon;
session_start();
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\FreeShip;
use Redirect;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Customer;
use Carbon\Carbon;
class CartController extends Controller
{
     public function delete($order_code)
    {
        DB::table('vp-orders')->where('order_code',$order_code)->delete();
        Session::put('message','Xóa Đơn Hàng Thành Công');
        return Redirect::to('cart/my-account');   
    }
    public function view_history($order_code){
        $order_detail=Order_detail::where('order_code',$order_code)->get();
        $ord=Order::orderby('created_at','DESC')->whereNotIn('order_code',[$order_code])->get();
        $order=Order::where('order_code',$order_code)->get();
        $orders=Order::where('order_code',$order_code)->get();
        foreach ($order as $key => $or) {
            # code...
            $customer_id=$or->customer_id;
            $phipping_id=$or->shipping_id;
            $order_status=$or->order_status;
            $order_code=$or->order_code;
        }
        $customer=Customer::where('cus_id',$customer_id)->first();
        $shipping=Shipping::where('ship_id',$phipping_id)->first();
        $order_details=Order_detail::with('product')->where('order_code',$order_code)->get();
        foreach ($order_details as $key => $order_id) {
            # code...
            $product_coupon = $order_id->product_coupon;
        }
        if($product_coupon != 'khong co coupon'){
            $coupon = Coupon::where('con_code',$product_coupon)->first();
            $coupon_condition = $coupon->con_condition;
            $coupon_number = $coupon->con_number;
        }else{
            $coupon_condition=2;
            $coupon_number=0;
        }

        return view('frontend.view-history')->with(compact('order_detail','customer','shipping','order_details','coupon_condition','coupon_number','ord','orders','order_status','order_code'));
    }
    public function my_account(Request $request){
        if(!Session::get('cus_id')){
            return redirect('cart/login-checkout')->with('error','Vui Lòng Đăng Nhập Để Xem Thông Tin');
        }else{
            $customer=Customer::where('cus_id',Session::get('cus_id'))->find(Session::get('cus_id'));
            $getorder=Order::where('customer_id',Session::get('cus_id'))->orderby('order_id','DESC')->get();
            return view('frontend.my-account')->with(compact('getorder','customer'));
        }
    }
    public function save_user(Request $request){
        $data=array();
        $data['cus_name']=$request->use_name;
        $data['cus_email']=$request->use_email;
        $data['cus_password']=$request->use_password;
        $data['cus_address']=$request->use_address;
        $data['cus_phone']=$request->use_phone;
        DB::table('vp-customer')->update($data);
        return Redirect::to('cart/my-account');
    }
    public function add_withlist(Request $request){
        $data=$request->all(); 
        $session_id=substr(md5(microtime()),rand(0,26),5);
        $withlist=Session::get('withlist');
        $is_avaiable=0;
        if($withlist==true){
            foreach($withlist as $key => $val)
            {
                if($val['product_id']==$data['cart_product_id'])
                {
                    $is_avaiable++;
                }
            }
            if($is_avaiable == 0){
                $withlist[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_img' => $data['cart_product_img'],
                'product_quantity'=>$data['cart_product_quantity'],
                'product_pricenew' => $data['cart_product_pricenew'],
            );
            Session::put('withlist',$withlist);
            }
        }
        else{
            $withlist[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_img' => $data['cart_product_img'],
                'product_quantity'=>$data['cart_product_quantity'],
                'product_pricenew' => $data['cart_product_pricenew'],
            );
            Session::put('withlist',$withlist);
        }
        Session::save();

    }
    public function confirm_order(Request $request){
        $today=Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $order_date=Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');

        $data=$request->all();
        $shipping=new Shipping();
        $shipping->ship_name = $data['shipping_name'];
        $shipping->ship_address = $data['shipping_address'];
        $shipping->ship_phone = $data['shipping_phone'];
        $shipping->ship_email = $data['shipping_email'];
        $shipping->ship_note = $data['shipping_note'];
        $shipping->ship_paymment = $data['shipping_method'];
        $shipping->save();

        $shipping_id = $shipping->ship_id;
        $check_code = substr(md5(microtime()),rand(0,26),5);

        $order = new Order();
        $order->customer_id = Session::get('cus_id');
        $order->shipping_id = $shipping_id;
        $order->order_status = 1;
        $order->order_code =  $check_code;
        $order->created_at=$today;
        $order->order_date=$order_date;
        $order->save();

        $order_detail = new Order_detail();
        if(Session::get('cart')){
            foreach (Session::get('cart') as $key => $cart) {
                # code...
                $order_detail = new Order_detail();
                $order_detail->order_code = $check_code;
                $order_detail->product_id = $cart['product_id'];
                $order_detail->product_image = $cart['product_img'];
                $order_detail->product_size = $cart['product_size'];
                $order_detail->product_color = $cart['product_color'];
                $order_detail->product_name = $cart['product_name'];
                $order_detail->product_price = $cart['product_pricenew'];
                $order_detail->product_quantity =  $cart['product_qty'];
                $order_detail->product_coupon = $data['order_coupon'];
                $order_detail->product_freeship = $data['order_free'];
                $order_detail->save();
            }
        }
        Session::forget('coupon');
        Session::forget('free');
        Session::forget('cart');
    } 
    public function thanh_toan(Request $request){
        echo 'chao em';
        
    }

    public function login(Request $request){
        $email=$request->email_account;
        $password=md5($request->password_account);
        $result=DB::table('vp-customer')->where('cus_email',$email)->where('cus_password',$password)->first();
        if($result){
            Session::put('cus_id',$result->cus_id);
            return Redirect::to('cart/my-account');
        }else{
            return Redirect::to('cart/login-checkout')->with('error','tài khoản hoặc mật khẩu không đúng mời nhập lại');
        }
    }
    public function login_checkout(){
        return view('frontend.login');
    }
    public function add_customer(Request $request){
        $data=array();
        $email=$request->email;
        $result=DB::table('vp-customer')->where('cus_email',$email)->first();

        if( $result){
            return Redirect::to('cart/login-checkout')->with('error','email bạn nhập đã được dùng mời nhập lại');
        }else{
            $data['cus_name']=$request->name;
            $data['cus_email']=$request->email;
            $data['cus_address']=$request->address;
            $data['cus_phone']=$request->phone;
            $data['cus_password']=md5($request->password);
            $cus_id=DB::table('vp-customer')->insertGetId($data);
            Session::put('cus_id',$cus_id);
            Session::put('cus_name',$request->name);
            return Redirect::to('cart/check-out-ajax');
        }
    }
    public function save_checkout(Request $request){
        $data=array();
        $data['ship_name']=$request->names;
        $data['ship_email']=$request->emails;
        $data['ship_address']=$request->addresss;
        $data['ship_phone']=$request->phones;
        $data['ship_note']=$request->notes;
        $data['ship_paymment']=$request->payment;


        $ship_id=DB::table('vp-shipping')->insertGetId($data);

        Session::put('ship_id',$ship_id);
        return Redirect::to('cart/check-out-ajax');
    }
    public function delete_free(){
        Session::forget('free');
        return redirect()->back();
    }
    public function calculate_free(Request $request){
        $data=$request->all();
        if($data['matp']){
            $freeship = FreeShip::where('fre_matp',$data['matp'])->where('fre_maqh',$data['maqh'])->where('fre_xaid',$data['xaid'])->get();
            if($freeship){
                $cout_freeship=$freeship->count();
                if($cout_freeship>0){
                    foreach ($freeship as $key => $free) {
                     # code...
                       Session::put('free',$free->fre_ship);
                       Session::save();
                    }     
                }else{
                       Session::put('free',50000);
                       Session::save();
                }
            }
        }
    }
    public function selectdelivery(Request $request){
        $data= $request->all();
        if($data['action']){
            $output=''; 
            if($data['action']=="city"){
                $select_provice= Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
                      $output.='<option><<----chọn quận huyện---->></option>';
                foreach ($select_provice as $key => $provice) {
                    # code...
                    $output.='<option value="'.$provice->maqh.'">'.$provice->name_quanhuyen.'</option>';
                }

            }else{
                $select_wards= Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
                      $output.='<option><<----chọn xã phường---->></option>';
                foreach ($select_wards as $key => $ward) {
                    # code...
                    $output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
                }
            }
             echo $output;
        }
    }
    public function check_out_ajax(){
        $city=City::orderby('matp','ASC')->get();
        return view('frontend/checkout-ajax')->with('city',$city);
    }
    
    public function getAddCart(Request $request, $id){
        
        $product = Product::find($id);
        $oldCart = Session::has('giohang') ? Session::get('giohang') : null;
        $giohang = new Cart($oldCart);
        $giohang->add($product,$product->prod_id,$product->prod_size);
        //dd($cart);
        $request->session()->put('giohang',$giohang);
    	return redirect()->intended('cart/show')->with('success','Thêm vào giỏ hàng thành công');   	
    }
    public function gio_hang(Request $request){

        $url_can=$request->url();
        $cate_product=DB::table('vp-categorys')->orderby('cate_id','desc')->get();
        $brand_product=DB::table('vp-brand')->where('bra_status',0)->orderby('bra_id','desc')->get();
        return view('frontend.cart-ajax')->with('url_can',$url_can)->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    }
    public function muc_yeu_thich(Request $request){
         $url_can=$request->url();
      
         return view('frontend.wishlist');
    }
    public function add_cart_ajax(Request $request){
        $data=$request->all(); 
        $session_id=substr(md5(microtime()),rand(0,26),5);
        $cart=Session::get('cart');
        $is_avaiable=0;
        if($cart==true){
            foreach($cart as $key => $val)
            {
                if($val['product_id']==$data['cart_product_id'])
                {
                    $is_avaiable++;
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_img' => $data['cart_product_img'],
                'product_quantity'=>$data['cart_product_quantity'],
                'product_qty' => $data['cart_product_qty'],
                'product_size' => $data['cart_product_size'],
                'product_color' => $data['cart_product_color'],
                'product_pricenew' => $data['cart_product_pricenew'],
            );
            Session::put('cart',$cart);
            }
        }
        else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_img' => $data['cart_product_img'],
                'product_quantity'=>$data['cart_product_quantity'],
                'product_qty' => $data['cart_product_qty'],
                'product_size' => $data['cart_product_size'],
                'product_color' => $data['cart_product_color'],
                'product_pricenew' => $data['cart_product_pricenew'],
            );
            Session::put('cart',$cart);
        }
        Session::save();
    }
    public function delete_cart_ajax($session_id){
        $cart=Session::get('cart');
        // echo'<pre>';
        // print_r($cart);
        // echo'<pre>';
        if('cart'==true){
            foreach ($cart as $key => $value) {
                if($value['session_id']==$session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('message','Xóa Sản Phẩm Thành Công ');
        }
        else{
             return redirect()->back()->with('message','Xóa Sản Phẩm Thất Bại');
        }
    }
    public function delete_withlist($session_id){
         $withlist=Session::get('withlist');
        // echo'<pre>';
        // print_r($cart);
        // echo'<pre>';
        if('withlist'==true){
            foreach ($withlist as $key => $value) {
                if($value['session_id']==$session_id){
                    unset($withlist[$key]);
                }
            }
            Session::put('withlist',$withlist);
            return redirect()->back()->with('message','Xóa Sản Phẩm Thành Công ');
        }
        else{
             return redirect()->back()->with('message','Xóa Sản Phẩm Thất Bại');
        }
    }
    public function update_cart_ajax(Request $request){
        $data= $request->all();
        $cart=Session::get('cart');
        if($cart==true){
            $message='';
            foreach ($data['cart_qty'] as $key => $value) {
                $i=0;
                foreach($cart as $session => $val){
                    $i++;
                    if($val['session_id']==$key && $value<$cart[$session]['product_quantity']){
                        $cart[$session]['product_qty']=$value;
                        $message.= '<p style="color:blue">'.$i.')Thông báo: Cập Nhập Số Lượng Sản Phẩm:' .$cart[$session]['product_name']. 'Thành Công</p>';
                    }elseif($val['session_id']==$key && $value>$cart[$session]['product_quantity']){
                        $message.= '<p style="color:red">'.$i.')Thông Báo: Cập Nhập Số Lượng Sản Phẩm:' .$cart[$session]['product_name']. 'Thất Bại</p>';
                    }
                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('message',$message);  
        }else{
            return redirect()->back()->with('message','Cập Nhập Thất Bại');
        }
    }
    public function delete_all_cart_ajax(){
        $cart=Session::get('cart');
        if($cart==true){
            Session::forget('cart');
            Session::forget('coupon');
            return redirect()->back()->with('message','Xóa Hết Thành Công');
        }
    }
    public function check_coupon(Request $request){
        $data=$request->all();
        $coupon=Coupon::where('con_code',$data['coupon'])->first();
        if($coupon){
            $cout_coupon=$coupon->count();
            if($cout_coupon>0){
                $coupon_session=Session::get('coupon');
                if($coupon_session==true){
                    $is_avaiable=0;
                    if($is_avaiable==0){
                        $cou[]=array(
                         
                            'coupon_code'=>$coupon->con_code,
                            'coupon_condition'=>$coupon->con_condition,
                            'coupon_number'=>$coupon->con_number,

                        );
                        Session::put('coupon',$cou);
                    }
                }else{
                     $cou[]=array(
                            
                            'coupon_code'=>$coupon->con_code,
                            'coupon_condition'=>$coupon->con_condition,
                            'coupon_number'=>$coupon->con_number,

                        );
                        Session::put('coupon',$cou);
                }
                Session::save();
                return redirect()->back()->with('message','Thêm Mã Giảm Giá Thành Công');
            }
        }else{
            return redirect()->back()->with('message','Mã Giảm Giá Không Đúng');
        }
    }
    public function delete_coupon(){
        $coupon=Session::get('coupon');
        if($coupon==true){
            Session::forget('coupon');
            return redirect()->back()->with('message','Xóa Mã Giảm Giá Thành Công');
        }
    }
    public function savecart(Request $request){
        $product_id=$request->proddd_id;
        $quantity=$request->qty;
        $color=$request->mau;
        $size=$request->size;

        $data=DB::table('vp-products')->where('prod_id',$product_id)->get();
        
        return view('frontend.cart');
    }
    public function getShowCart(){

    	if(!Session::has('giohang')){
            return view('frontend.cart',['products'=>null]);
        }
        $oldCart= Session::get('giohang');
        $giohang= new Cart($oldCart);
        $products = $giohang->items;
        $totalPrice = $giohang->totalPrice;
        $totalQty= $giohang->totalQty;
    	return view('frontend.cart',compact ('products','totalPrice','totalQty'));

    } 
    public function getDeleteCart($id){

    	$oldCart = Session::has('giohang') ? Session::get('giohang') : null;
        $giohang = new Cart($oldCart);
        $giohang->reduceByOne($id);

    
        Session::put('giohang',$giohang);
        if($giohang->totalQty<=0){
            Session::forget('giohang');
        }
    	return redirect()->intended('cart/show');
    }
    public function getUpdateCart(Request $request){
        $oldCart= Session::get('giohang');
        $giohang= new Cart($oldCart);
        Cart::update($request->qty,$request->prod_id);
    }

    public function postComplete(Request $request){
        $data['info']=$request->all();
        $email=$request->email;
        
        
        Mail::send('frontend.mail',$data,function($message) use ($email){
            $message->from('tamcb2708@gmail.com','tâm nguyễn');
            $message->to($email,$email);
            
            $message->subject('Xac nhan hoa don mua cua tuan tam');
        });

        return redirect::to('complete');
    }
    public function getComplete(){
        return view('frontend.complete');
    }
    public function logout_checkout(){
        Session::flush();
        return Redirect::to('cart/login-checkout');
    }


}
