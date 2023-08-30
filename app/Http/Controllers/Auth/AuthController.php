<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('auth.register');
    }



    public function register(RegisterRequest $request)
    {
        $inputs = $request->all();

        // create user
        $user = User::create($inputs);
        if($user)
        {
            Auth::loginUsingId($user->id);
        }

        return to_route('home');
        // return to_route('')->with('success');
    }




    public function loginForm()
    {
        return view('auth.login');
    }





    public function login(LoginRequest $request)
    {
        $user = User::where('mobile', $request->mobile)->first();
        if ($user && Auth::attempt(['mobile' => $request->mobile, 'password' => $request->password])) {
            return to_route('admin.category.index');
        }
        else
        {
            toast('پسورد یا شماره موبایل شما اشتباه است!' ,'error');
            return back();
        }

    }

}


