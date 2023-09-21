<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\PermissionCreateRequest;
use App\Http\Requests\Admin\User\RoleCreateRequest;
use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use App\Models\User;


class UserController extends Controller
{
    public function index()
    {
        $users = User::Paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function indexAdmin()
    {
        $users = User::where('user_type', 1)->Paginate(10);
        return view('admin.user.indexAdmin', compact('users'));
    }





    public function permission(User $user)
    {
        $permissions = Permission::all();
        return view('admin.user.permission', compact('user', 'permissions'));
    }



    public function permissionCreate(User $user, PermissionCreateRequest $request)
    {
        $inputs = $request->all();

        $user->permissions()->sync($inputs['permissions']);
        return to_route('admin.user.index')->with('alert-success', 'دسترسی برای کاربر با موفقیت ایجاد شد😄!');
    }



    public function role(User $user)
    {
        $roles = Role::all();
        return view('admin.user.role', compact('user', 'roles'));
    }


    public function roleCreate(User $user, RoleCreateRequest $request)
    {
        $inputs = $request->all();

        $user->roles()->sync($inputs['roles']);
        return to_route('admin.user.index')->with('alert-success', 'نقش برای کاربر با موفقیت ایجاد شد😄!');
    }

}
