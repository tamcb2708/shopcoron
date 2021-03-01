<?php

namespace App\Http\Controllers\Admin;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use App\Models\Category;
use DB;
Use Redirect;
class ProductController extends Controller
{
    public function getProduct(){
        $data['productlist']=DB::table('vp-products')->join('vp-categorys','vp-products.prod_cate','=','vp-categorys.cate_id')->orderBy('prod_id','desc')->get();
    	return view('backend.product',$data);

    }
    public function getAddProduct(){
        $data['catelist']=Category::all();

    	return view('backend.addproduct',$data);

    }
    public function postAddProduct(AddProductRequest $request){
        $filename=$request->img->getClientOriginalName();
        $product= new Product;
        $product->prod_name=$request->name;
        $product->prod_slug=$request->name;
        $product->prod_quantity=$request->quantity;
        $product->prod_sold=$request->sold;
        $product->prod_img=$filename;
        $product->prod_price=$request->price;
        $product->prod_pricenew=$request->pricenew;
        $product->prod_status=$request->status;
        $product->prod_descripton=$request->description;
        $product->prod_more=$request->more;
        $product->prod_sty=$request->sty;
        $product->prod_comp=$request->comp;
        $product->prod_prop=$request->prop;
        $product->prod_cate=$request->cate;
        $product->save();
        $request->img->storeAs('public/anhSanPham',$filename);
        return back();


    }

    public function getEditProduct($id){
        $data['product']= Product::find($id);
        $data['listcate']=Category::all();
    	return view('backend.editproduct',$data);

    }
      public function active($id)
    {
        DB::table('vp-products')->where('prod_id',$id)->update(['prod_status'=>1]);
        return Redirect::to('admin/product');
    }
    public function actived($id)
    {
        DB::table('vp-products')->where('prod_id',$id)->update(['prod_status'=>0]);
        return Redirect::to('admin/product');
    }
    public function postEditProduct(Request $request,$id){
        $product= new Product;
        $arr['prod_name'] =$request->name;
        $arr['prod_slug']=$request->name;
        $arr['prod_price']=$request->price;
        $arr['prod_size']=$request->size;
        $arr['prod_pricenew']=$request->pricenew;
        $arr['prod_descripton']=$request->description;
        $arr['prod_status']=$request->status;
        $arr['prod_more']=$request->more;
        $arr['prod_sty']=$request->sty;
        $arr['prod_comp']=$request->comp;
        $arr['prod_prop']=$request->prop;

        $arr['prod_cate']=$request->cate;
        if($request->hasFile('img')){
            $img=$request->img->getClientOriginalName();
            $arr['prod_img']=$img;
            $request->img->storeAs('public/anhSanPham',$img);
        }
        $product::where('prod_id',$id)->update($arr);
        return redirect('admin/product');

    }

    public function getDeleteProduct($id){
        Product::destroy($id);
        return back();

    }
}
