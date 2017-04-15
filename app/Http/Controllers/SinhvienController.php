<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sinhvien;
use Hash;
use Excel;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
class SinhvienController extends Controller
{
    public function show(){
      $sinhviens=Sinhvien::all();
      return view('admin.sinhvien.list',compact('sinhviens'));
    }
    public function add(Request $request){
        $this->validate($request,[
          'tensinhvien' => 'required|max:255',
          'email' => 'required|email|max:255|unique:users|regex:/(.*)vnu\.edu\.vn$/i',
          'mssv'=>'required',
          'class'=>'required'
        ]);
        $count=Sinhvien::where('mssv',$request->mssv)->count();
        if($count==0){
          $user=new User;
          $user->name=$request->tensinhvien;
          $user->email=$request->email;
          $user->password=bcrypt($request->mssv);
          $user->role=3;
          $user->save();

          //Tao sinh vien
        //  $getUser=User::where('email',$request->email)->first();
          $sinhvien=new Sinhvien;
          $sinhvien->tensinhvien=$request->tensinhvien;
          $sinhvien->class=$request->class;
          $sinhvien->mssv=$request->mssv;
          $sinhvien->user_id=$user->id;
          $sinhvien->save();

          return redirect()->back();
        }else{
          return "trung sinh vien";
        }
    }

    public function delete($id){
    $MONHOC=Sinhvien::find($id)->monhocs;
      foreach($MONHOC as $monhoc){
        $DIEM=$monhoc->diems;
        foreach($DIEM as $diem){
          $diem->delete();
        }
        $monhoc->delete();
      }
      $sinhvien=Sinhvien::find($id);
      Sinhvien::find($id)->delete();
      User::find($sinhvien->user_id)->delete();
      return redirect()->back();
    }

    public function addExcel(){
      $data=Excel::load(Input::file('file'),function($reader){
      })->get();
      foreach($data as $data){
        $count=Sinhvien::where('mssv',$data['mssv'])->count();
        if($count!=0){
          continue;
        }else{
          //Tao user
          $user=new User;
          $user->name=$data['tensinhvien'];
          $user->email=$data['email'];
          $user->password=bcrypt($data['mssv']);
          $user->role=3;
          $user->save();
          //tao sv
        //  $getUser=User::where('email',$data['email'])->first();
          $sinhvien=new Sinhvien;
          $sinhvien->tensinhvien=$data['tensinhvien'];
          $sinhvien->mssv=$data['mssv'];
          $sinhvien->class=$data['lop'];
          $sinhvien->user_id=$user->id;
          $sinhvien->save();
        }
      }
          return redirect()->back();
      }


}
