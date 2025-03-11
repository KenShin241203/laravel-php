<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('products.index');
    }
    return redirect()->route('login');
});


Route::resource('products', ProductController::class)
    ->middleware(['auth', \App\Http\Middleware\CheckRole::class . ':admin']);

Auth::routes();

Route::get('/home', function () {
    return redirect()->route('products.index');
})->name('home');
