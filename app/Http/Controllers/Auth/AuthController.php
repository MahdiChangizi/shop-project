<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ActivationRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Admin\ActiveCode;
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




    public function activationForm()
    {
        if(auth()->check())
        {
            if (auth()->user()->mobile_verified_at == null) {
            return view('auth.activation');
            }
            else {
                abort('404');
            }
        }
    }




    public function activation(ActivationRequest $request)
    {
        if(auth()->check())
        {

            if (auth()->user()->mobile_verified_at == null) {

                $code = auth()->user()->codes()->where('expired_at', '>', now())->first();
                if ($code) {
                    if($request->mobile == auth()->user()->mobile)
                    {

                        if($request->code == $code->code)
                        {
                            auth()->user()->mobile_verified_at = now();
                            auth()->user()->save();

                            toast('حساب شما با موفقیت فعال شد!' ,'success');
                            return to_route('coustomer.profile');
                        }
                        else
                        {
                            toast('کد وارد شده معتبر نیست!' ,'error');
                            return back();
                        }


                    }   else {
                        toast('شماره موبایل وارد شده معتبر نیست!' ,'error');
                        return back();
                    }
                }
                else {
                    toast('کد ارسال شده معتبر نیست!' ,'error');
                    return back();
                }
            }
            else {
                abort('404');
            }
        }
    }


}


