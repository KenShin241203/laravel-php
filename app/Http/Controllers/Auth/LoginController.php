<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function redirectTo()
    {
        if (Auth::user()->role === 'admin') {
            return route('products.index');
        }
        return route('user.products.index');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
