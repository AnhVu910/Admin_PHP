<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class checkAdminLogin
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
        // nếu user đã đăng nhập
        if (Auth::check())
        {
            $user = Auth::user();
            // nếu level =1 (admin), =2 (nhân viên) thì truy cập trang quản trị
            if ($user->role == 1 || $user->role == 2)
            {
                return $next($request);
            }
            else
            {
                // Auth::logout();
                return redirect()->route('user.home');
            }
        } else
            return redirect('login');
            // return redirect('frontend/home');
    }
}
