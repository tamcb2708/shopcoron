<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use DB;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Customer;
use App\Models\Comment;
use App\Models\CommentBlog;
use App\Models\Follow;
use App\Models\Contact;
use App\Models\Blog;
use App\Models\Rating;
use App\Cart;
use Session;
class FrontendController extends Controller
{
	public function insert_rating(Request $request){
		$data=$request->all();
		$rating=new Rating();
		$rating->product_id=$data['product_id'];
		$rating->rating=$data['index'];
		$rating->save();
		echo 'done';
	}
	public function service(){
		$brand=DB::table('vp-brand')->where('bra_status',0)->get();
		return view('frontend.service')->with('brand',$brand);
	}

	public function about(){
		$brand=DB::table('vp-brand')->where('bra_status',0)->get();
		return view('frontend.about')->with('brand',$brand);
	}
	public function post_comment_blog(Request $request,$id){
		$comment=new CommentBlog;
		$comment->comm_name=$request->nem;
		$comment->comm_email=$request->ema;
		$comment->comm_content=$request->con;
		$comment->comm_blog=$id;
		$comment->save();
		return back();
	}
	public function blog_detail($id){
		$data['name']=Blog::find($id);
		$blog=DB::table('vp-blog')->where('bt_status',0)->WhereNotIn('bl_id',[$id])->take(3)->get();
		$blog1=DB::table('vp-blog')->where('bt_status',0)->orderBy('created_at','desc')->WhereNotIn('bl_id',[$id])->take(4)->get();
		$category=DB::table('vp-categorys')->get();
		$comment=DB::table('vp-comment-blog')->where('comm_blog',$id)->get();
		$data['items']=Blog::where('bt_status',0)->orderBy('bl_id','desc')->paginate(9);
		$bl=Blog::where('bl_id',$id)->first();
		$bl->bl_view=$bl->bl_view+1;
		$bl->save(); 
		return view('frontend.blog-details',$data)->with('blog',$blog)->with('blog1',$blog1)->with('category',$category)->with('comment',$comment);
	}
	public function gethome(Request $request){
		$new_product=DB::table('vp-products')->where('prod_cate',4)->orderBy('prod_id','desc')->take(3)->get();
		$featured_product=DB::table('vp-products')->where('prod_cate',3)->orderBy('prod_id','desc')->take(3)->get();
		$data['category']=Category::all();
		$brand=DB::table('vp-brand')->where('bra_status','0')->orderBy('bra_id','desc')->get();
		$slidebar=DB::table('vp-slidebar')->where('sli_status','0')->orderBy('sli_id','desc')->get();
		$customer=Customer::where('cus_id',Session::get('cus_id'))->find(Session::get('cus_id'));
		return view('frontend.index',$data)->with('brand',$brand)->with('newproduct',$new_product)->with('featuredproduct',$featured_product)->with('slide',$slidebar)->with('customer',$customer);
	}
	public function shop(){
		$products = Product::get();
		$san_pham=DB::table('vp-products')->where('prod_status',0)->orderBy('prod_id','desc')->get();
		$chi_tiet=DB::table('vp-products')->where('prod_status',0)->orderBy('prod_id','desc')->get();
		$category=DB::table('vp-categorys')->orderBy('cate_id')->get();
		$data['items']=Product::simplePaginate(9);
		return view('frontend.shopone',$data)->with('sanpham',$san_pham)->with('chitiet',$chi_tiet)->with('category',$category);
	}
	public function blog(){
		$blog=DB::table('vp-blog')->where('bt_status',0)->orderBy('bl_id','desc')->get();
		$brand=DB::table('vp-brand')->orderBy('bra_id','desc')->get();
		$data['items']=Blog::where('bt_status',0)->orderBy('bl_id','desc')->paginate(9);
		return view('frontend.blog',$data)->with('blog',$blog)->with('brand',$brand);
	}
	public function getDetail($id, Product $product){
		$data['item']=Product::find($id);
		$data['category']=Category::all();
		$data['comments']=Comment::where('com_product',$id)->get();
		$data['items']=Product::where('prod_cate',$id)->orderBy('prod_id','desc')->paginate(9);
		$productt=DB::table('vp-products')->join('vp-categorys','vp-products.prod_cate','=','vp-categorys.cate_id')->where('vp-products.prod_id',$id)->orderBy('prod_id','desc')->get();
		foreach ($productt as $key => $value) {
			$category=$value->prod_cate;
		}
		$relate=DB::table('vp-products')->where('prod_cate',1)->where('prod_status',0)->whereNotIn('prod_id',[$id])->orderBy('prod_id','desc')->take(3)->get();
		$product=DB::table('vp-products')
		->join('vp-categorys','vp-products.prod_cate','=','vp-categorys.cate_id')
		->where('vp-categorys.cate_id',$category)
		->where('vp-products.prod_status',0)
		->whereNotIn('vp-products.prod_id',[$id])
		->orderBy('prod_id','desc')
		->take(3)
		->get();
		$rating=Rating::where('product_id',$id)->avg('rating');
		$rating=round($rating);
		$pro=Product::where('prod_id',$id)->first();
		$pro->prod_view=$pro->prod_view+1;
		$pro->save();
		return view('frontend.viewdetail',$data)->with('product',$product)->with('relate',$relate)->with('rating',$rating);
	}
	public function getCategory($id){
		$products = Product::get();
		$maxPrice = Product::select('prod_pricenew')->where('prod_status',0)->where('prod_cate',$id)->max('prod_pricenew');
        $minPrice = Product::select('prod_pricenew')->where('prod_status',0)->where('prod_cate',$id)->min('prod_pricenew');
		$data['catename']=Category::find($id);
		$data['category']=Category::all()->whereNotIn('cate_id',[$id]);
		$data['items']=Product::where('prod_cate',$id)->where('prod_status',0)->orderBy('prod_id','desc')->paginate(9);
		return view('frontend.shop',$data,compact(['maxPrice','minPrice','products']));
	}
	public function postComment(Request $request,$id){
		$comment=new Comment;
		$comment->com_name=$request->name;
		$comment->com_email=$request->email;
		$comment->com_content=$request->content;
		$comment->com_product=$id;
		$comment->save();
		return back();
	}
	public function getSearch(Request $request){
		$result = $request->result;
		$data['keyword']=$result;
		$result = str_replace(' ','%', $result);
		$data['items']=Product::where('prod_name','like','%'.$result.'%')->get();
		return view('frontend.search',$data);
	}
	public function follow(Request $request){
		$follow=new Follow;
		$follow->fl_email=$request->email;
		$follow->save();
		return back();
	}
	public function contact(Request $request){
		$contact=new Contact;
		$contact->ct_name=$request->name;
		$contact->ct_mes=$request->message;
		$contact->ct_phone=$request->phone;
		$contact->ct_subject=$request->subject;
		$contact->ct_email=$request->email;
		$contact->save();
		return back();
	}
	public function getcheckout()
	{
		if(!Session::has('giohang')){
            return view('frontend.cart',['products'=>null]);
        }
        $oldCart= Session::get('giohang');
        $giohang= new Cart($oldCart);
        $products = $giohang->items;
        $totalPrice = $giohang->totalPrice;
        $totalQty= $giohang->totalQty;
    	return view('frontend.checkout',compact ('products','totalPrice','totalQty'));
	}
	public function postcheckout(Cart $cart, Request $request)
	{
	    $oldCart= Session::post('giohang');
        $giohang= new Cart($oldCart);
		$customer= Customer::create([
			'cus_name'=>$request->name,
			'cus_email'=>$request->email,
			'cus_address'=>$request->address,
			'cus_phone'=>$request->phone,
			'cus_note'=>$request->text
		]);
		$order= Order::create([
			'order_total'=>$cart->totalPrice(),
			'customer'=>$customer->cus_id,
			'order_note'=>$request->text,
			'order_payment'=>$request->payment
		]);
		foreach ($cart->items as $item) {
			Order_detail::create([
				'product_id'=>$item['prod_id'],
				'order_id'=>$order->id,
				'order_detail_quantity'=>$item['totalQty'],
				'Order_detail_price'=>$item['prod_pricenew'],
			]);
		}
		Session(['giohang'=>[]]);
		return redirect()->route('checkout')->with('success','Đặt Hàng Thành Công');
	}
}
