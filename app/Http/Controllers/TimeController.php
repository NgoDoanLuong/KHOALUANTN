<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hocky;
class TimeController extends Controller
{
    public function createTime($hocky_id,Request $request){
        $hocky=Hocky::find($hocky_id);
        $hocky->start=$request->start;
        $hocky->end=$request->end;
        $hocky->save();
        return redirect()->back();
    }
    
}
