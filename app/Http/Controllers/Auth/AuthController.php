<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ActivationRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Admin\ActiveCode;
use App\Models\User;
use App\Notifications\CodeNotification;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    

    public function loginForm()
    {
        return view('auth.login');
    }





    public function login(LoginRequest $request)
    {
        $user = User::where('mobile', $request->mobile)->first();
        if ($user && Auth::attempt(['mobile' => $request->mobile, 'password' => $request->password])) {

            if($user['mobile_verified_at'] == null)
            {
                $code = ActiveCode::generateCode($user);
                $request->user()->notify(new CodeNotification($code, $user['mobile']));
                toast('کد فعال سازی ارسال شد!' ,'success');
                return to_route('auth.activationForm');
            } else  {
                toast('شما با موفقیت وارد حساب خود شدید!' ,'success');
                return to_route('coustomer.profile');
            }
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
                            auth()->user()->codes()->delete();

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



    public function logout()
    {
        Auth::logout();
        toast('شما با موفقیت از حساب خود خارج شدید!' ,'success');
        return to_route('coustomer.home');
    }

}