<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::simplePaginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function indexAdmin()
    {
        $users = User::where('user_type', 1)->simplePaginate(10);
        return view('admin.user.indexAdmin', compact('users'));
    }

}
