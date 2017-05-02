<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hocky;
use App\Lopmonhoc;
use App\Tieuchi;
use App\Diem;
use App\Giangvien;
use Carbon\Carbon;
class KetquaController extends Controller
{
  public function show_hk(){
    $hocky=Hocky::orderBy('created_at','DESC')->get();
    $time_now=Carbon::now('Asia/Ho_Chi_Minh');
    $check_time=array();
    foreach($hocky as $hk){
      $batdau=Carbon::parse($hk->batdau);
      $ketthuc=Carbon::parse($hk->ketthuc);
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
    return view('admin.ketqua.hocky_list',compact('hocky','check_time'));
  }

  public function show_lopmonhoc($hk_id){
    $hocky=Hocky::find($hk_id);
    $lopmonhocs=Hocky::find($hk_id)->lopmonhocs;
    return view('admin.ketqua.lopmonhoc_list',compact('hocky','lopmonhocs'));
  }

  public function sinhvien_show_hk(){
    $hocky=Hocky::orderBy('created_at','DESC')->get();
    $time_now=Carbon::now('Asia/Ho_Chi_Minh');
    $check_time=array();
    foreach($hocky as $hk){
      $batdau=Carbon::parse($hk->batdau);
      $ketthuc=Carbon::parse($hk->ketthuc);
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
    return view('sinhvien.hocky_list',compact('hocky','check_time'));
  }

  public function sinhvien_show_lopmonhoc($hk_id){
    $hocky=Hocky::find($hk_id);
    $lopmonhocs=Hocky::find($hk_id)->lopmonhocs;
    return view('sinhvien.danhsach_lopmonhoc',compact('hocky','lopmonhocs'));
  }

  public function danhsach_giangvien(){
    $giangviens=Giangvien::all();
    return view('admin.ketqua.giangvien',compact('giangviens'));
  }

  public function ketqua_giangvien($giangvien_id){
    $hockys=Hocky::all();
    $tieuchis=array();

    $taplop=array();
    $result=array();
    $tong=array();
    foreach($hockys as $hocky){

      $lopmonhocs=Lopmonhoc::where('hocky_id',$hocky->id)->where('giangvien_id',$giangvien_id)->get();
      $check=Lopmonhoc::where('hocky_id',$hocky->id)->where('giangvien_id',$giangvien_id)->count();

      if($check!=0){
          $ARRAY=array();
      foreach($lopmonhocs as $lop){
          $so_sv_dg_theo_tc=array();
          $monhocs=$lop->monhocs;
          $dem1=0;
          $dem2=0;
          $dem3=0;
          $dem4=0;
          $dem5=0;
          foreach($monhocs as $monhoc){
          $count1=Diem::where('diemdanhgia',1)->where('monhoc_id',$monhoc->id)->count();
          $dem1+=$count1;
          $count2=Diem::where('diemdanhgia',2)->where('monhoc_id',$monhoc->id)->count();
          $dem2+=$count2;
          $count3=Diem::where('diemdanhgia',3)->where('monhoc_id',$monhoc->id)->count();
          $dem3+=$count3;
          $count4=Diem::where('diemdanhgia',4)->where('monhoc_id',$monhoc->id)->count();
          $dem4+=$count4;
          $count5=Diem::where('diemdanhgia',5)->where('monhoc_id',$monhoc->id)->count();
          $dem5+=$count5;
        }
        if($dem1+$dem2+$dem3+$dem4+$dem5!=0){
          array_push($so_sv_dg_theo_tc,$lop);
          array_push($so_sv_dg_theo_tc,$dem1);
          array_push($so_sv_dg_theo_tc,$dem2);
          array_push($so_sv_dg_theo_tc,$dem3);
          array_push($so_sv_dg_theo_tc,$dem4);
          array_push($so_sv_dg_theo_tc,$dem5);
          array_push($ARRAY,$so_sv_dg_theo_tc);
        }
      }
      if($ARRAY!=null){
        array_push($result,$hocky->tenhocky);
        array_push($result,$ARRAY);
        array_push($tong,$result);
      }
      }
    }
    $giangvien=Giangvien::find($giangvien_id);
    return view('admin.ketqua.lop_giangvien',compact('tong','giangvien'));
  }
}
