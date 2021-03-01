<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
Use Redirect;

class SlidebarController extends Controller
{
    public function addslide()
    {
    	return view('backend.addslidebar');

    }
    public function allslide()
    {
        $all=DB::table('vp-slidebar')->get();
        $data=view('backend.slidebar')->with('all',$all);
    	return view('backend.master')->with('backend.slidebar',$data);
    }
    public function saveslide(Request $request)
    {
    	$data=array();
    	$data['sli_name']=$request->name;
    	$data['sli_image']=$request->image;
    	$data['sli_status']=$request->status;
    	$data['sli_des']=$request->desc;

    	DB::table('vp-slidebar')->insert($data);
    	Session::put('message','Thêm Quảng Cáo Thành Công');
    	return Redirect::to('admin/slidebar/add-slidebar');
    }

    public function active($id)
    {
        DB::table('vp-slidebar')->where('sli_id',$id)->update(['sli_status'=>1]);
        Session::put('message','Không Hiển Thị Quảng Cáo Thành Công');
        return Redirect::to('admin/slidebar');
    }
    public function actived($id)
    {
        DB::table('vp-slidebar')->where('sli_id',$id)->update(['sli_status'=>0]);
        Session::put('message','Hiển Thị Quảng Cáo Thành Công');
        return Redirect::to('admin/slidebar');
    }
    public function editslide($id)
    {
        $all=DB::table('vp-slidebar')->where('sli_id',$id)->get();
        $data=view('backend.editslidebar')->with('all',$all);
        return view('backend.master')->with('backend.editslidebar',$data);
    }
    public function updateSlide($id,Request $request)
    {
        $data=array();
        $data['sli_name']=$request->name;
        $data['sli_image']=$request->image;
        $data['sli_des']=$request->desc;
        DB::table('vp-slidebar')->where('sli_id',$id)->update($data);
        Session::put('message',' Sửa Quảng Cáo Thành Công');
        return Redirect::to('admin/slidebar');
    }
    public function deleteslide($id)
    {
        DB::table('vp-slidebar')->where('sli_id',$id)->delete();
        Session::put('message','Xóa Quảng Cáo Thành Công');
        return Redirect::to('admin/slidebar');   
    }
}
