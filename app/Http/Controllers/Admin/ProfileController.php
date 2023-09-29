<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
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



    public function update(User $user)
    {
        
    }
}