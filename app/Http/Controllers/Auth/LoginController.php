<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Admin\ActiveCode;
use App\Models\User;
use App\Notifications\CodeNotification;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }


    public function login(LoginRequest $request)
    {
        /* find user */
        $user = User::where('mobile', $request->mobile)->first();

        /* login user */
        if ($user && Auth::attempt(['mobile' => $request->mobile, 'password' => $request->password]))
        {
            if($user['mobile_verified_at'] == null)
            {
                /* create code */
                $code = ActiveCode::generateCode($user);

                /* send code to user */
                $request->user()->notify(new CodeNotification($code, $user['mobile']));
                toast('کد فعال سازی ارسال شد!' ,'success');
                return to_route('auth.activationForm');

            }
            else
            {
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
}
