<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Hash;
class LoginController extends Controller
{
  public function getLogin(){
    return view('test.login');
  }
  public function postLogin (Request $request){
     if(Auth::attempt(['email' => $request->email, 'password' =>$request->password,'role'=>1],$remember=false)){
       return redirect()->route('hocky.list');
     }
       elseif (Auth::attempt(['email' => $request->email, 'password' =>$request->password,'role'=>2])) {
           return "Giang vien";
       }
       elseif (Auth::attempt(['email' => $request->email, 'password' =>$request->password,'role'=>3])) {
           return "Sinvvien";
       }
     else {
       return redirect()->back()->with(['flash_message'=>'Tài khoản hoặc mật khẩu không đúng']);
     }
   }

   public function logout(Request $request){
     Auth::logout();

     return "logut thanh cong ";
   }
}
