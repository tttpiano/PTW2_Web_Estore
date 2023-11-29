<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdminLogin
{
    public function handle($request, Closure $next)
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (Auth::check()) {
            // Lấy thông tin người dùng hiện tại
            $user = Auth::user();

            // Kiểm tra xem loại người dùng có phải là "admin" hay không
            if ($user->type === 'admin') {
                return $next($request);
            }
        }

        // Nếu không phải admin, chuyển hướng về trang đăng nhập
        return redirect()->route('login');
    }
}
