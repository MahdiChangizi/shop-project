<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Profile\ProfileRequest;
use App\Models\User;
use App\Services\SaveImage;
use Illuminate\Support\Facades\File;

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



    public function update(User $user, ProfileRequest $request, SaveImage $saveImage)
    {
        try {
            $inputs = $request->all();
            $file = $request->file('profile');
            
            
            if (!auth()->user()->profile) 
            {
                $saveImage->save($file, 'profile');
                $inputs['profile'] = $saveImage->saveImageDb();
                $user->profile()->create($inputs);
                return back()->with('alert-success', 'عملیات با موفقیت انجام شد!');
            }   
            
            elseif(auth()->user()->profile)
            {
                if (auth()->user()->profile->profile) {
                    File::delete(public_path(auth()->user()->profile->profile));
                }
                $saveImage->save($file, 'profile');
                $inputs['profile'] = $saveImage->saveImageDb();
                $user->profile->update($inputs);
                return back()->with('alert-success', 'عملیات با موفقیت انجام شد!');
            }
        } catch (\Exception $e) {
            File::delete(public_path($inputs['profile']));
            return back()->with('alert-error', 'عملیات با موفقیت انجام نشد!');
        }
        
    }
}