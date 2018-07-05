<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class checkAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 1 la admin nha
        if(Auth::user()->role != 1)
            return redirect('admin/dangnhap')->with(['thongbao' => "Không phải là admin"]);
        return $next($request);
    }
}
