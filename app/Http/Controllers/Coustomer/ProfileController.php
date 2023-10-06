<?php

namespace App\Http\Controllers\Coustomer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Coustomer\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('coustomer.home.profile.profile');
    }


    public function edit()
    {
        return view('coustomer.home.profile.editProfile');
    }


    public function update(User $user, ProfileRequest $request)
    {
        $inputs = $request->all();

        $user->update([
            'userName' => $inputs['userName']
        ]);

        if ($user->profile) {
            $user->profile->update([
                'first_name' => $inputs['first_name'],
                'last_name'  => $inputs['last_name']
            ]);
        } else {
            $user->profile()->create([
                'first_name' => $inputs['first_name'],
                'last_name'  => $inputs['last_name']
            ]);
        }

        toast('پروفایل شما با موفقیت ویرایش شد!', 'success');
        return to_route('coustomer.profile');
    }


}
