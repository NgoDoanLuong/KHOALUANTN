<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hocky;
use App\Lopmonhoc;
use App\Monhoc;
use App\Giangvien;
use App\Sinhvien;
use Excel;
use App\Tieuchi;
use App\Diem;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
class DiemController extends Controller
{
    public function showDiem($id_lopmonhoc){
      $hocky_id=Lopmonhoc::find($id_lopmonhoc)->hocky_id;
      $sv_lop_hoc=Lopmonhoc::find($id_lopmonhoc)->monhocs;
      $count_diem=0;
      foreach($sv_lop_hoc as $diems){
        $count_diem+=$diems->diems->count();
      }


      $tieuchi=Hocky::find($hocky_id)->tieuchis;
        $sinhvien_arr=array();
      foreach($sv_lop_hoc as $sinhvien){
        $check_sv_danhgia=$sinhvien->diems->count();
        if($check_sv_danhgia!=0){
          array_push($sinhvien_arr,$sinhvien);
        }
      }
      // comment:toggle$array=array();
      $array_result=array();
      $so_sv_danhgia=count($sinhvien_arr);

    foreach($tieuchi as $tieu){
      $array=array();
        for($diem=1;$diem<6;$diem++){
          $count=0;
          foreach($sinhvien_arr as $sinhvien){
            $check_count=Diem::where('diemdanhgia',$diem)->where('tieuchi_id',$tieu->id)->where('monhoc_id',$sinhvien->id)->count();
            if($check_count!=0){
              $count++;
            }
          }
          array_push($array,$count);
        }

        array_push($array_result,$array);
      }
      return view('test',compact('tieuchi','array_result'));
    }


    public function form($id){
      $lopmonhoc=Lopmonhoc::find($id);
      $hocky_id=Lopmonhoc::find($id)->hocky_id;
      $tieuchi=Tieuchi::where('hocky_id',$hocky_id)->get();
      return view('danhgia',compact('tieuchi','lopmonhoc'));
    }

    public function danhgia(Request $request){
      $sinhvien=Sinhvien::find(22);
      $lopmonhoc=Lopmonhoc::find(2);
      $monhoc=Monhoc::where('sinhvien_id',$sinhvien->id)->where('lopmonhoc_id',$lopmonhoc->id)->first();


    $tieuchi=Hocky::find($lopmonhoc->hocky_id)->tieuchis;
      foreach($tieuchi as $tc){
        $id_tieuchi=$tc->id;
        $diem_dg=$request->$id_tieuchi;
        $diem = new Diem;
        $diem->diemdanhgia=$diem_dg;
        $diem->tieuchi_id=$tc->id;
        $diem->monhoc_id=$monhoc->id;
        $diem->save();
      }


      return redirect()->back();

    }
}
