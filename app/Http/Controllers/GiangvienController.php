<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sinhvien;
use App\Giangvien;
use Hash;
use Excel;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
class GiangvienController extends Controller
{
  public function show(){
    $giangviens=Giangvien::all();
    return view('admin.giangvien.list',compact('giangviens'));
  }
  public function add(Request $request){
      $this->validate($request,[
        'tengiangvien' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users|regex:/(.*)vnu\.edu\.vn$/i',
        'magiangvien'=>'required',
      ]);
      $count=Giangvien::where('magiangvien',$request->magiangvien)->count();
      if($count==0){
        //Tao user
        $user=new User;
        $user->email=$request->email;
        $user->name=$request->tengiangvien;
        $user->password=bcrypt($request->magiangvien);
        $user->role=2;
        $user->save();

        //Tao giang vien

        $giangvien=new Giangvien;
        $giangvien->tengiangvien=$request->tengiangvien;
        $giangvien->magiangvien=$request->magiangvien;
        $giangvien->user_id=$user->id;
        $giangvien->save();
        return redirect()->back();
      }else{
        return "trung ma giang vien";
      }
  }

  public function delete($id){
    $LOPMONHOC=Giangvien::find($id)->lopmonhocs;//Tim het cac lop mon hoc
    foreach($LOPMONHOC as $lop){
      $MONHOC=$lop->monhocs;//Tim het mon hoc cua tat ca sinh vien trong hoc ki
      foreach($MONHOC as $mon){
        $DIEM=$mon->diems;  //Tim het diem danh gia
        foreach($DIEM as $item){
            $item->delete();//Xoa diem
        }
        $mon->delete();  //Xoa het mon hoc cua tat ca sinh vien
      }
      $lop->delete();  //Xoa het lop mon hoc
    }

    //Xoá giang vien
    $giangvien=Giangvien::find($id);
    Giangvien::find($id)->delete();
    User::find($giangvien->user_id)->delete();
    return redirect()->back();
  }


      public function addExcel(){
        $data=Excel::load(Input::file('file'),function($reader){
        })->get();
        foreach($data as $data){
          $count=Giangvien::where('magiangvien',$data['magiangvien'])->count();
          if($count==0){
            //Tao user
            $user =new User;
            $user->email=$data['email'];
            $user->name=$data['tengiangvien'];
            $user->password=bcrypt($data['magiangvien']);
            $user->role=2;
            $user->save();
            //Tao giang vien
            $giangvien=new Giangvien;
            $giangvien->tengiangvien=$data['tengiangvien'];
            $giangvien->magiangvien=$data['magiangvien'];
            $giangvien->user_id=$user->id;
            $giangvien->save();
          }else{
            continue;
            }
          }
        return redirect()->back();
        }

}
