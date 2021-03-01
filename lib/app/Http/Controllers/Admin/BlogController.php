<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
class BlogController extends Controller
{
    public function addblog(){
    	return view('backend.addblog');
    }
    public function allblog(){
    	$all=DB::table('vp-blog')->get();
    	$data=view('backend.blog')->with('all',$all);
    	return view('backend.master')->with('backend.blog',$data);
    }
    public function saveblog(Request $request){
    	$data=array();
    	$data['bl_name']=$request->name;
    	$data['bl_metatitle']=$request->title;
    	$data['bl_description']=$request->desc;
    	$data['bl_image']=$request->image;
    	$data['bt_status']=$request->status;

    	DB::table('vp-blog')->insert($data);
    	Session::put('message','Them blog thanh cong');
    	return Redirect::to('admin/blog/add-blog');
    }
    public function actived($id){
    	DB::table('vp-blog')->where('bl_id',$id)->update(['bt_status'=>0]);
    	Session::put('message','Hien thi blog thanh cong');
    	return Redirect::to('admin/blog');
    }
    public function active($id){
    	DB::table('vp-blog')->where('bl_id',$id)->update(['bt_status'=>1]);
    	Session::put('message','Khong hien thi blog thanh cong');
    	return Redirect::to('admin/blog');
    }
     public function editblog($id)
    {
        $all=DB::table('vp-blog')->where('bl_id',$id)->get();
        $data=view('backend.editblog')->with('all',$all);
        return view('backend.master')->with('backend.editblog',$data);
    }
    public function updateblog($id,Request $request){
    	$data=array();
    	$data['bl_name']=$request->name;
    	$data['bl_metatitle']=$request->title;
    	$data['bl_description']=$request->desc;
    	$data['bl_image']=$request->image;
    	DB::table('vp-blog')->where('bl_id',$id)->update($data);
    	Session::put('message','cap nhap thong tin blog thanh cong');
    	return Redirect::to('admin/blog');
    }
    public function deleteblog($id){
    	DB::table('vp-blog')->where('bl_id',$id)->delete();
    	Session::put('message','xoa blog thanh cong');
    	return Redirect::to('admin/blog');
    }
}
