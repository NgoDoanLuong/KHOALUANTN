<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Facades\Input;
use App\Tieuchi;
use App\Hocky;
use App\Diem;
class TieuchiController extends Controller
{
    public function show(){
      $tieuchi=Tieuchi::all();
      $hocky=Hocky::all();
      return view('admin.tieuchi.add',compact('hocky','tieuchi'));
    }



  public function add(Request $request){
      $count=Tieuchi::where('hocky_id',$request->hocky_id)->where('tentieuchi',$request->tentieuchi)->count();
      if($count==0){
        $tieuchi=new Tieuchi;
        $tieuchi->tentieuchi=$request->tentieuchi;
        $tieuchi->hocky_id=$request->hocky_id;
        $tieuchi->save();
        return redirect()->back();
      }else return "tieuchitrung";
    }

    public function addExcel(Request $request){
      $data=Excel::load(Input::file('file'),function($reader){
      })->get();
      for($i=0;$i<count($data);$i++){
        $count=Tieuchi::where('hocky_id',$request->hocky_id)->where('tentieuchi',$data[$i]['ten_tieu_chi'])->count();
        if($count!=0){
          continue;
        }else{
          $tieuchi=new Tieuchi;
          $tieuchi->tentieuchi=$data[$i]['ten_tieu_chi'];
          $tieuchi->hocky_id=$request->hocky_id;
          $tieuchi->save();
        }
      }
      return redirect()->back();

    }
    public function delete($id){
      $DIEM=Tieuchi::find($id)->diems;
      foreach($DIEM as $diem){
        $diem->delete();
      }
      Tieuchi::find($id)->delete();
      return redirect()->back();
    }


}
