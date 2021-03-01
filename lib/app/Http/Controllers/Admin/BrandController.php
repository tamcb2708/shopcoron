<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
Use Redirect;
class BrandController extends Controller
{
    public function addbrand()
    {
    	return view('backend.addbrand');

    }
    public function allbrand()
    {
        $all=DB::table('vp-brand')->get();
        $data=view('backend.brand')->with('all',$all);
    	return view('backend.master')->with('backend.brand',$data);
    }
    public function savebrand(Request $request)
    {
    	$data=array();
    	$data['bra_name']=$request->name;
    	$data['bra_desc']=$request->mota;
    	$data['bra_image']=$request->anh;
    	$data['bra_status']=$request->status;

    	DB::table('vp-brand')->insert($data);
    	Session::put('message','Them danh muc thanh cong');
    	return Redirect::to('admin/brand/add-brand');
    }

    public function active($id)
    {
        DB::table('vp-brand')->where('bra_id',$id)->update(['bra_status'=>1]);
        Session::put('message','khong hien thi danh muc san pham thanh cong');
        return Redirect::to('admin/brand');
    }
    public function actived($id)
    {
        DB::table('vp-brand')->where('bra_id',$id)->update(['bra_status'=>0]);
        Session::put('message',' hien thi danh muc san pham thanh cong');
        return Redirect::to('admin/brand');
    }
    public function editbrand($id)
    {
        $all=DB::table('vp-brand')->where('bra_id',$id)->get();
        $data=view('backend.editbrand')->with('all',$all);
        return view('backend.master')->with('backend.editbrand',$data);
    }
    public function updatebrand($id,Request $request)
    {
        $data=array();
        $data['bra_name']=$request->name;
        $data['bra_desc']=$request->mota;
        $data['bra_image']=$request->anh;
        DB::table('vp-brand')->where('bra_id',$id)->update($data);
        Session::put('message',' sua  danh muc san pham thanh cong');
        return Redirect::to('admin/brand');
    }
    public function deletebrand($id)
    {
        DB::table('vp-brand')->where('bra_id',$id)->delete();
        Session::put('message',' xoa  danh muc san pham thanh cong');
        return Redirect::to('admin/brand');   
    }
}
