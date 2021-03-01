<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use DB;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function getlogin(){
        return view('backend.login');
    }
     
     public function postlogin(Request $request)
    {
         $arr = ['email'=>$request->email,'password'=>$request->password];
        if($request->Remember){
            $Remember=true;
        }
        else{
            $Remember=false;
        }
        if(Auth::attempt($arr,$Remember)){
           return redirect()->intended('admin/home');
        }
        else{
              return back()->withInput()->with('error','tài khoản hoặc mật khẩu không đúng mời nhập lại');
        }
    }
      
}
