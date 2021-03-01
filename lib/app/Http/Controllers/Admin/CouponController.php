<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
Use Redirect;
class CouponController extends Controller
{
    public function addcoupon()
    {
    	return view('backend.addcoupon');

    }
    public function allcoupon()
    {
        $all=DB::table('vp-coupon')->get();
        $data=view('backend.coupon')->with('all',$all);
    	return view('backend.master')->with('backend.coupon',$data);
    }
    public function savecoupon(Request $request)
    {
    	$data=array();
    	$data['con_name']=$request->name;
    	$data['con_code']=$request->code;
    	$data['con_number']=$request->number;
    	$data['con_condition']=$request->condition;
    	$data['con_time']=$request->time;
    	DB::table('vp-coupon')->insert($data);
    	Session::put('message','Them ma giam gia thanh cong');
    	return Redirect::to('admin/coupon/add-coupon');
    }
    public function editcoupon($id)
    {
        $all=DB::table('vp-coupon')->where('con_id',$id)->get();
        $data=view('backend.editcoupon')->with('all',$all);
        return view('backend.master')->with('backend.editcoupon',$data);
    }
    public function updatecoupon($id,Request $request)
    {
        $data=array();
        $data['con_name']=$request->name;
    	$data['con_code']=$request->code;
    	$data['con_number']=$request->number;
    	$data['con_condition']=$request->condition;
    	$data['con_time']=$request->time;
        DB::table('vp-coupon')->where('con_id',$id)->update($data);
        Session::put('message',' sua ma giam gia thanh cong');
        return Redirect::to('admin/coupon');
    }
    public function deletecoupon($id)
    {
        DB::table('vp-coupon')->where('con_id',$id)->delete();
        Session::put('message','  xoa ma giam gia thanh cong');
        return Redirect::to('admin/coupon');   
    }
}
