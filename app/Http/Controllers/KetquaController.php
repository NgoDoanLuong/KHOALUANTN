<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hocky;
use App\Lopmonhoc;
use App\Tieuchi;
use App\Diem;
class KetquaController extends Controller
{
  public function show_hk(){
    $hocky=Hocky::orderBy('created_at','DESC')->get();;
    return view('admin.ketqua.hocky_list',compact('hocky'));
  }

  public function show_lopmonhoc($hk_id){
    $hocky=Hocky::find($hk_id);
    $lopmonhocs=Hocky::find($hk_id)->lopmonhocs;
    return view('admin.ketqua.lopmonhoc_list',compact('hocky','lopmonhocs'));
  }

  public function sinhvien_show_hk(){
    $hocky=Hocky::orderBy('created_at','DESC')->get();;
    return view('sinhvien.hocky_list',compact('hocky'));
  }

  public function sinhvien_show_lopmonhoc($hk_id){
    $hocky=Hocky::find($hk_id);
    $lopmonhocs=Hocky::find($hk_id)->lopmonhocs;
    return view('sinhvien.danhsach_lopmonhoc',compact('hocky','lopmonhocs'));
  }
}
