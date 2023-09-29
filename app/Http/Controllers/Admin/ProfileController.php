<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\SaveImage;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }


    
    public function setting()
    {
        return view('admin.profile.setting');
    }



    public function update(User $user, Request $request, SaveImage $saveImage)
    {
        $inputs = $request->all();
    
        $file = $request->file('profile');
        $saveImage->save($file, 'profile');
        $inputs['profile'] = $saveImage->saveImageDb();

        $user->profile->update($inputs);
        dd('hi');

    }
}