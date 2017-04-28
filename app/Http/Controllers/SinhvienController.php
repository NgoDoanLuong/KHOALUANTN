<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sinhvien;
use Hash;
use App\Hocky;
use Excel;
use App\Monhoc;
use App\User;
use App\Lopmonhoc;
use App\Tieuchi;
use App\Diem;
use Carbon\Carbon;
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

          return redirect()->back()->with(['flash_level'=>'success','flash_message'=>'Tạo thành công']);
        }else{
          return redirect()->back()->with(['flash_level'=>'danger','flash_message'=>'Trùng sinh viên']);
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
      return redirect()->back()->with(['message_delete'=>'Xoá thành công']);
    }

    public function addExcel(){
      $data=Excel::load(Input::file('file'),function($reader){
      })->get();
      foreach($data as $data){
        $count=Sinhvien::where('mssv',$data['mssv'])->count();
        if($count==0){
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
        }else{
          continue;
        }
      }
          return redirect()->back()->with(['flash_level'=>'success','flash_message'=>'Tạo thành công']);
      }

      public function home_sv(){
        $time_now=Carbon::now('Asia/Ho_Chi_Minh');
        $hockys=Hocky::orderBy('created_at','DESC')->get();
        $check_time=array();
        foreach($hockys as $hocky){
          $batdau=Carbon::parse($hocky->batdau);
          $ketthuc=Carbon::parse($hocky->ketthuc);
          if($time_now<$batdau){
            array_push($check_time,-1);
          }
          if($time_now>$ketthuc){
            array_push($check_time,1);
          }
          if($time_now>=$batdau && $time_now<=$ketthuc){
            array_push($check_time,0);
          }

        }
        return view('sinhvien.home',compact('hockys','check_time'));
      }

      public function monhoc_sinhvien($user_id,$hocky_id){
        $sinhvien=Sinhvien::where('user_id',$user_id)->first();
        $lopmonhoc=Hocky::find($hocky_id)->lopmonhocs;
        $monhocs=array();
        foreach($lopmonhoc as $monhoc_sv){
          $check=Monhoc::where('sinhvien_id',$sinhvien->id)->where('lopmonhoc_id',$monhoc_sv->id)->count();
          if($check!=0){
            $monhoc=Monhoc::where('sinhvien_id',$sinhvien->id)->where('lopmonhoc_id',$monhoc_sv->id)->first();
            array_push($monhocs,$monhoc);
          }
        }
        $check_danhgia=array();
        foreach($monhocs as $monhoc){
          $check=$monhoc->diems->count();
          array_push($check_danhgia,$check);
        }
        return view('sinhvien.monhoc',compact('monhocs','check_danhgia'));
      }

      public function form_danhgia($monhoc_id){
        $id=$monhoc_id;
        $monhoc=Monhoc::find($id);
        $lopmonhoc=Lopmonhoc::where('id',$monhoc->lopmonhoc_id)->first();
        $hocky_id=$lopmonhoc->hocky_id;
        $tieuchi=Tieuchi::where('hocky_id',$hocky_id)->get();
        return view('sinhvien.danhgia',compact('tieuchi','lopmonhoc','id'));
      }



}
