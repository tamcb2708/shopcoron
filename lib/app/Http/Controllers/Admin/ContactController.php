<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


class ContactController extends Controller
{
    public function allcontact(){
    	$contact=DB::table('vp-contact')->orderby('ct_id','desc')->get();
    	return view('backend.contact')->with('contact',$contact);
    }
    public function getcontact ($id){
    	
    }
}
