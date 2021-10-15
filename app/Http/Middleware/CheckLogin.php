<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // return $next($request);
        if ($request->session()->exists('admin')) {  // Nếu có session 
            return $next($request);
        } else { // Nếu không tồn tại 
            return Redirect::route('login')->with("error", "Chưa đăng nhập");
        }
    }
}

