<?php
// app/Http/Middleware/CheckRole.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Thêm dòng này

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check() || Auth::user()->role !== $role) { // Sửa thành Auth::check()
            abort(403, 'Bạn không có quyền truy cập trang này');
        }
        return $next($request);
    }
}
