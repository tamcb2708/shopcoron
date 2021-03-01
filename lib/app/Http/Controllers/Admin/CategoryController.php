<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use DB;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;
class CategoryController extends Controller
{
    public function getCate(){
    	$data['catelist']=Category::all();
        $cate=DB::table('vp-categorys')->where('cate_parent',0)->orderby('cate_id','desc')->get();
    	return view('backend.layout-static',$data)->with('cate',$cate);
    }
    public function postCate(AddCateRequest $request){
    	$category= new Category;
    	$category->cate_name=$request->name;
    	$category->cate_slug=$request->name;
        $category->cate_parent=$request->parent;
    	$category->save();
    	return back();
    }
    public function getEditCate($id){
    	$data['cate']=Category::find($id);
    	return view('backend.layout-sidenav-light',$data);
    }
    public function postEditCate(EditCateRequest $request,$id){
    	$category=  Category::find($id);
    	$category->cate_name=$request->name;
    	$category->cate_slug=$request->name;
    	$category->save();
    	return redirect()->intended('admin/category'); 
    	

    }
    public function getDeleteCate($id){
    	Category::destroy($id);
    	return back();

    }
}
