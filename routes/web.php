<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserProductController;
use App\Http\Controllers\UserManagementController;
use App\Http\Middleware\CheckRole;

Route::get('/', function () {
    if (Auth::check()) {
        $role = Auth::user()->role;
        if (in_array($role, ['admin', 'employee'])) {
            return redirect()->route('products.index');
        }
        return redirect()->route('user.products.index');
    }
    return redirect()->route('login');
});

// Chỉ admin và employee truy cập products
Route::resource('products', ProductController::class)
    ->middleware(['auth', \App\Http\Middleware\CheckRole::class . ':admin,employee']);

// Routes cho user xem sản phẩm
Route::get('/shop', [UserProductController::class, 'index'])->name('user.products.index');
Route::get('/shop/{id}', [UserProductController::class, 'show'])->name('user.products.show');

// Route quản lý tài khoản (chỉ admin)
Route::resource('users', UserManagementController::class)
    ->middleware(['auth', \App\Http\Middleware\CheckRole::class . ':admin']);


Auth::routes();

Route::get('/home', function () {
    if (Auth::check()) {
        $role = Auth::user()->role;
        if (in_array($role, ['admin', 'employee'])) {
            return redirect()->route('products.index');
        }
        return redirect()->route('user.products.index');
    }
    return redirect()->route('login');
})->name('home');
