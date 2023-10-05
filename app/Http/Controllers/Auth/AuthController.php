<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function logout()
    {
        Auth::logout();
        toast('شما با موفقیت از حساب خود خارج شدید!' ,'success');
        return to_route('coustomer.home');
    }

}