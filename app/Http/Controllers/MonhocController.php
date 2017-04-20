<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hocky;
use App\Lopmonhoc;
use App\Monhoc;
use App\Giangvien;
use App\Sinhvien;
use Excel;
use App\Diem;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
class MonhocController extends Controller
{

    public function showAdd($id){
      $hocky=Hocky::find($id);
      $lopmonhoc=Lopmonhoc::where('hocky_id',$id)->get();
      return view('admin.monhoc.showAdd',compact('hocky','lopmonhoc'));
    }
    public function show(){
      $hocky=Hocky::all();
      return view('admin.monhoc.show',compact('hocky'));
    }

    public function createSV_lop(Request $request){
      $data=Excel::load(Input::file('file'),function($reader){
      })->get();
      foreach($data as $data){
        $sinhvien=Sinhvien::where('mssv',$data['mssv'])->first();
        $check_svlop=Monhoc::where('sinhvien_id',$sinhvien->id)->where('lopmonhoc_id',$request->lopmonhoc_id)->count();
        if($check_svlop==0){
          $monhoc_SV=new Monhoc;
          $monhoc_SV->lopmonhoc_id=$request->lopmonhoc_id;
          $sinhvien=Sinhvien::where('mssv',$data['mssv'])->first();
          $monhoc_SV->sinhvien_id=$sinhvien->id;
          $monhoc_SV->save();
        }else {
          continue;
        }
      }
      return redirect()->back();
    }
    public function add(Request $request){
      $sinhvien=Sinhvien::where('mssv',$request->mssv)->first();
      $check_svlop=Monhoc::where('sinhvien_id',$sinhvien->id)->where('lopmonhoc_id',$request->lopmonhoc_id)->count();
      if($check_svlop==0){
        $monhoc_SV=new Monhoc;
        $monhoc_SV->sinhvien_id=$sinhvien->id;
        $monhoc_SV->lopmonhoc_id=$request->lopmonhoc_id;
        $monhoc_SV->save();
        return redirect()->back();
      }else return "Lop da co sinh vien";
    }
    public function listSV($id){
      $DS_sinhvien=Lopmonhoc::find($id)->monhocs;
      return view('admin.monhoc.listsv',compact('DS_sinhvien'));
    }
    public function xoaSV($id){
      $DIEM=Monhoc::find($id)->diems;
      foreach($DIEM as $diem){
        $diem->delete();
      }
      Monhoc::find($id)->delete();
      return redirect()->back();
    }
}
