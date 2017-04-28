<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hocky;
use App\Lopmonhoc;
use App\Monhoc;
use App\Giangvien;
use Excel;
use App\Diem;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
class LopmonhocController extends Controller
{
    public function show(){
        $hockys=Hocky::all();
        $lopmonhocs=Lopmonhoc::all();
        return view('admin.lopmonhoc.list',compact('hockys','lopmonhocs'));
    }
    public function add(Request $request){
      $count=Lopmonhoc::where('hocky_id',$request->hocky_id)->where('mamonhoc',$request->mamonhoc)->count();
      if($count==0){
        $count_gv=Giangvien::where('magiangvien',$request->magiangvien)->count();
        if($count_gv==0){
          return "Chưa có giảng viên cho môn này";
        }else{
          $giangvien=Giangvien::where('magiangvien',$request->magiangvien)->first();
          $lopmonhoc=new Lopmonhoc;
          $lopmonhoc->mamonhoc=$request->mamonhoc;
          $lopmonhoc->magiangvien=$request->magiangvien;
          $lopmonhoc->tenmonhoc=$request->tenmonhoc;
          $lopmonhoc->hocky_id=$request->hocky_id;
          $lopmonhoc->giangvien_id=$giangvien->id;
          $lopmonhoc->save();
          return redirect()->back()->with(['flash_level'=>'success','flash_message'=>'Tạo thành công']);
      }
    }else{
      return redirect()->back()->with(['flash_level'=>'danger','flash_message'=>'Đã có lớp môn học này']);
    }
  }

    public function addExcel(Request $request){
      $data=Excel::load(Input::file('file'),function($reader){
      })->get();
      $chuacogiangvien=array();
      foreach($data as $data){
        $check_gv=Giangvien::where('magiangvien',$data->magiangvien)->count();
        if($check_gv==0){
          array_push($chuacogiangvien,$magiangvien);
          continue;
        }
        $check_lop=Lopmonhoc::where('hocky_id',$request->hocky_id)->where('mamonhoc',$data['malop'])->count();
        if($check_lop==0){
          $giangvien=Giangvien::where('magiangvien',$data['magiangvien'])->first();
          $lopmonhoc=new Lopmonhoc;
          $lopmonhoc->tenmonhoc=$data['tenmonhoc'];
          $lopmonhoc->mamonhoc=$data['malop'];
          $lopmonhoc->magiangvien=$data['magiangvien'];
          $lopmonhoc->hocky_id=$request->hocky_id;
          $lopmonhoc->giangvien_id=$giangvien->id;
          $lopmonhoc->save();
        }
      }
      if(empty($chuacogiangvien)){
        return redirect()->back()->with(['flash_level'=>'success','flash_message'=>'Tạo thành công']);
      }else{
        echo "Chua co giang vien".$chuacogiangvien;
      }
    }

    public function delete($id){
      $MONHOC=Lopmonhoc::find($id)->monhocs;
      foreach($MONHOC as $monhoc){
        $DIEM=$monhoc->diems;
        foreach($DIEM as $diem){
          $diem->delete();
        }
        $monhoc->delete();
      }
      Lopmonhoc::find($id)->delete();
      return redirect()->back()->with(['message_delete'=>'Xoá thành công']);
    }

    public function getEdit($id){
      $lopmonhoc=Lopmonhoc::find($id);
      $hocky=Hocky::find($lopmonhoc->hocky_id);
      return view('admin.lopmonhoc.edit',compact('lopmonhoc','hocky'));
    }

    public function edit($id, Request $request){
      $lopmonhoc=Lopmonhoc::find($id);
      $check_gv=Giangvien::where('magiangvien',$request->magiangvien)->count();
      if($check_gv==0){
        return "Chưa có giảng viên cho môn học";
      }else{
        if($request->mamonhoc!=$lopmonhoc->mamonhoc){
          $check_lop=Lopmonhoc::where('magiangvien',$request->magiangvien)->count();
          if($check_lop==0){
            $lopmonhoc->mamonhoc=$request->mamonhoc;
            $lopmonhoc->magiangvien=$request->magiangvien;
            $lopmonhoc->tenmonhoc->$request->tenmonhoc;
            $lopmonhoc->save();
            return redirect()->back();
          }else{
            return "trung mon hoc khac";
          }
        }else{
          $lopmonhoc->magiangvien=$request->magiangvien;
          $lopmonhoc->tenmonhoc=$request->tenmonhoc;
          $lopmonhoc->save();
          return redirect()->back();
        }
      }
    }

    //Danh sach sinh vien cua lop mon hoc
    public function listSV($id){
      $dssv=Lopmonhoc::find($id)->monhocs;
      $lopmonhoc=Lopmonhoc::find($id);

      return view('admin.lopmonhoc.dssv',compact('dssv','lopmonhoc'));
    }
}
