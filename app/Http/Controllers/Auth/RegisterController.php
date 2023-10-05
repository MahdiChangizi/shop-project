<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Admin\ActiveCode;
use App\Models\User;
use App\Notifications\CodeNotification;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        /* validateion */
        $inputs = $request->all();

        /* create user */
        $user = User::create($inputs);
        
        /* login user */
        if($user)
        {
            Auth::loginUsingId($user->id);
        }
        
        if($user['mobile_verified_at'] == null)
        {
            /* generate code  =>  csend code to user => return to rute activation*/
            $code = ActiveCode::generateCode($user);
            $request->user()->notify(new CodeNotification($code, $user['mobile']));
            
            return to_route('auth.activationForm');
        } 
        else 
        {
            return to_route('coustomer.profile');
        }
    }
}
