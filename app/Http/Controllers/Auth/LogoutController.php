<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout()
    {
        /* null mobile_verified_at */
        Auth::user()->mobile_verified_at = null;
        Auth::user()->save();
        
        /* logout */
        Auth::logout();
        toast('شما با موفقیت از حساب خود خارج شدید!' ,'success');
        return to_route('coustomer.home');
    }

}
