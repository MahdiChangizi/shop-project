<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ActivationRequest;

class ActivationController extends Controller
{

    public function activationForm()
    {
        /* checke login user */
        if (auth()->check())
            return auth()->user()->mobile_verified_at == null ? view('auth.activation') : abort('404');
        else
            return abort('404');
    }


    public function activation(ActivationRequest $request)
    {
        if (auth()->check()) {
            if (auth()->user()->mobile_verified_at == null) {

                $code = auth()->user()->codes()->where('expired_at', '>', now())->first();
                if ($code) {
                    if ($request->mobile == auth()->user()->mobile) {

                        if ($request->code == $code->code) {
                            auth()->user()->mobile_verified_at = now();
                            auth()->user()->save();
                            auth()->user()->codes()->delete();

                            toast('حساب شما با موفقیت فعال شد!', 'success');
                            return to_route('coustomer.profile');
                        } else {
                            toast('کد وارد شده معتبر نیست!', 'error');
                            return back();
                        }
                    } else {
                        toast('شماره موبایل وارد شده معتبر نیست!', 'error');
                        return back();
                    }
                } else {
                    toast('کد ارسال شده معتبر نیست!', 'error');
                    return back();
                }
            } else {
                abort('404');
            }
        }
    }
}
