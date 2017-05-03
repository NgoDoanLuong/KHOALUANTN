<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hocky;
use App\Lopmonhoc;
use App\Monhoc;
use App\Giangvien;
use App\Sinhvien;
use Excel;
use App\User;
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
        $sinhvien_chua_danh_gia=array();
      foreach($sv_lop_hoc as $sinhvien){
        $check_sv_danhgia=$sinhvien->diems->count();
        if($check_sv_danhgia!=0){
          array_push($sinhvien_arr,$sinhvien);
        }else{
          array_push($sinhvien_chua_danh_gia,$sinhvien);
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
      $sv_da_danh_gia=0;
      foreach($sv_lop_hoc as $sv_danh_gia){
        $check_sv_da_danh_gia=$sv_danh_gia->diems->count();
        if($check_sv_da_danh_gia!=0){
          $sv_da_danh_gia++;
        }
      }
      $si_so=$sv_lop_hoc->count();
      $lopmonhoc=Lopmonhoc::find($id_lopmonhoc);
      return view('result',compact('tieuchi','array_result','lopmonhoc','si_so','sv_da_danh_gia','count_diem','sinhvien_chua_danh_gia'));
    }


    public function form_update($monhoc_id){
      $monhoc=Monhoc::find($monhoc_id);
      $lopmonhoc=Lopmonhoc::where('id',$monhoc->lopmonhoc_id)->first();
      $hocky=Hocky::where('id',$lopmonhoc->hocky_id)->first();
      $tieuchi=Tieuchi::where('hocky_id',$hocky->id)->get();
      $tap_diem=$monhoc->diems->toArray();

     return view('sinhvien.update',compact('tieuchi','monhoc','tap_diem'));
    }

    public function danhgia($monhoc_id,Request $request){
      /*
  $user=User::find(23);
      $sinhvien=Sinhvien::where('user_id',$user->id)->first();
      $lopmonhoc=Lopmonhoc::find(2);  */

      $monhoc=Monhoc::find($monhoc_id);
      //$monhoc=Monhoc::where('sinhvien_id',$sinhvien->id)->where('lopmonhoc_id',$lopmonhoc->id)->first();
      $lopmonhoc=Lopmonhoc::where('id',$monhoc->lopmonhoc_id)->first();
    //  $diems=Diem::where('monhoc_id',$monhoc->id)->count();
    //  if($diems==0){
      $tieuchi=Hocky::find($lopmonhoc->hocky_id)->tieuchis;
        foreach($tieuchi as $tc){
          $id_tieuchi=$tc->id;
          $diem_dg=$request->$id_tieuchi;
          $diem = new Diem;
          $diem->diemdanhgia=$diem_dg;
          $diem->tieuchi_id=$tc->id;
          $diem->monhoc_id=$monhoc->id;
          $diem->save();
        /*
    }
      }else return "da danh gia";    */

    }

      return redirect()->route('sinhvien.home');

  }

    public function update_diem($monhoc_id,Request $request){
        $monhoc=Monhoc::find($monhoc_id);
        $lopmonhoc=Lopmonhoc::where('id',$monhoc->lopmonhoc_id)->first();
        $tieuchi=Hocky::find($lopmonhoc->hocky_id)->tieuchis;
        foreach($tieuchi as $tc){
          $diem=Diem::where('monhoc_id',$monhoc_id)->where('tieuchi_id',$tc->id)->first();
          $id_tieuchi=$tc->id;
          $diem_dg=$request->$id_tieuchi;
          $diem->diemdanhgia=$diem_dg;
          $diem->save();
        }
        return redirect()->back()->with(['message_diem'=>'Đánh giá lại thành công']);
    }


}
