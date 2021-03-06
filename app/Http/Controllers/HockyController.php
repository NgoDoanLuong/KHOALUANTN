<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hocky;
use App\Lopmonhoc;
use App\Tieuchi;
use App\Diem;
use Carbon\Carbon;
class HockyController extends Controller
{
    //
    public function show(){
    $hocky=Hocky::orderBy('created_at','DESC')->get();
    $time=Hocky::select('batdau')->first();
    $time_start=array();
    $time_end=array();
    foreach($hocky as $hk){
        $time1_start= Carbon::parse($hk->batdau);
        $time2_start=$time1_start->format('Y-m-d\Th:i');
        array_push($time_start,$time2_start);

        $time1_end= Carbon::parse($hk->ketthuc);
        $time2_end=$time1_end->format('Y-m-d\Th:i');
        array_push($time_end,$time2_end);

    }
    return view('admin.hocky.add',compact('hocky','time_start','time_end'));
  }
  public function add(Request $request){
      $hocky=new Hocky;
      $hocky->tenhocky=$request->tenhocky;
      $hocky->save();
      return redirect()->back()->with(['flash_level'=>'success','flash_message'=>'Tạo thành công']);
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
    return redirect()->back()->with(['message_delete'=>'Xoá thành công']);
  }

  public function createTime($hocky_id,Request $request){
      $hocky=Hocky::find($hocky_id);
      $hocky->batdau=$request->batdau;
      $hocky->ketthuc=$request->ketthuc;
      $hocky->save();
      return redirect()->back()->with(['message_time'=>'Thhêm thời gian thành công']);
  }

}
