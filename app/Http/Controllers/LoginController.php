<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use SendsPasswordResetEmails;
use Illuminate\Support\Facades\Validator;
use Hash;
use App\Http\Controllers\Controller;
class LoginController extends Controller
{

  public function getLogin(){
    return view('login');
  }
  public function postLogin (Request $request){
     if(Auth::attempt(['email' => $request->email, 'password' =>$request->password,'role'=>1],$remember=false)){
       return redirect()->route('hocky.list');
     }
       elseif (Auth::attempt(['email' => $request->email, 'password' =>$request->password,'role'=>2])) {
           return redirect()->route('giangvien.home');
       }
       elseif (Auth::attempt(['email' => $request->email, 'password' =>$request->password,'role'=>3])) {
           return redirect()->route('sinhvien.home');
       }
     else {
       return redirect()->back()->with(['flash_message'=>'Tài khoản hoặc mật khẩu không đúng']);
     }
   }

   public function logout(Request $request){
     Auth::logout();

     return redirect()->route('getLogin');
   }

   public function showLinkForm(){
     return view('email');
   }

}
