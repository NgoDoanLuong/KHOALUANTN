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
