<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hocky;
use App\Lopmonhoc;
use App\Tieuchi;
class HockyController extends Controller
{
    //
    public function show(){
    $hocky=Hocky::all();
    return view('admin.hocky.add',compact('hocky'));
  }
  public function add(Request $request){
      $hocky=new Hocky;
      $hocky->tenhocky=$request->tenhocky;
      $hocky->save();
      return redirect()->back();
  }
  public function delete($id){
    $LOPMONHOC=Hocky::find($id)->lopmonhocs;//Tim het cac lop mon hoc
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
    //Xoá tiêu chí
    $TIEUCHIS=Hocky::find($id)->tieuchis;
    foreach($TIEUCHIS as $tieuchi){
      $tieuchi->delete();
    }
    //Xoá học kì
    Hocky::find($id)->delete();
    return redirect()->back();
  }

}
