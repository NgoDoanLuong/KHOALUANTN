<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Giangvien
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle( $request, Closure $next,$guard=null)
     {
         if (Auth::guard($guard)->guest() || Auth::user()->role!=2) {
        if ($request->ajax()) {
            return response('Unauthorized.', 401);
        } else {
            return redirect()->route('getLogin');
        }
       }

         return $next($request);
       }
}
/*
@if($check_time[$loop->index]==-1)
{{$hocky->tenhocky}}
<button type="button" class="btn btn-warning">Chưa đến thời gian đánh giá</button>
@elseif($check_time[$loop->index]==1)
  <a href="{{route('giangvien.lopmonhoc',['user_id'=>Auth::user()->id,'hocky_id'=>$hocky->id])}}">{{$hocky->tenhocky}}</a>
<button type="button" class="btn btn-info">  Hết thời gian đánh giá</button>
@else
<a href="{{route('sinhvien.list_monhoc',['user_id'=>Auth::user()->id,'hocky_id'=>$hocky->id])}}">{{$hocky->tenhocky}}</a>
<button type="button" class="btn btn-success">Trong thời gian đánh giá</button>
@endif*/
