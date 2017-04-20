<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
class Time extends Controller
{
  public function post_time(Request $request){

    //$time_format=Carbon::createFromFormat('Y-m-d H', $time,'Asia/Ho_Chi_Minh')->toDateTimeString();
    $time_now=Carbon::now('Asia/Ho_Chi_Minh');
    $start=Carbon::parse($request->start);
    $end=Carbon::parse($request->end);
    echo $time_now;
    echo '</br>';
    echo $start;
      echo '</br>';
    echo $end;
      echo '</br>';
      if($time_now>$start && $time_now<$end){
        echo "true";
      }else echo"false";

  }
}
