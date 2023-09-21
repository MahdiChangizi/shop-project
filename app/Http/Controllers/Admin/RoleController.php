<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\RoleStoreRequest;
use App\Http\Requests\Admin\Role\RoleUpdateRequest;
use App\Models\Admin\Permission;
use App\Models\Admin\Role;


class RoleController extends Controller
{



    public function index()
    {
        $roles = Role::Paginate(10);
        return view('admin.role.index', compact('roles'));
    }



    public function create()
    {
        $permissions = Permission::all();
        return view('admin.role.create', compact('permissions'));
    }



    public function store(RoleStoreRequest $request)
    {
        $inputs = $request->all();

        $role = Role::create($inputs);
        $role->permissions()->sync($inputs['permissions']);

        return to_route('admin.role.index')->with('alert-success', 'نقش جدید با موفقیت ایجاد شد!');
    }



    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.role.edit', compact('role', 'permissions'));
    }



    public function update(Role $role, RoleUpdateRequest $request)
    {
        $inputs = $request->all();

        $result = $role->update($inputs);
        $role->permissions()->sync($inputs['permissions']);

        return to_route('admin.role.index')->with('alert-success', 'نقش شما با موفقیت ویرایش شد!');
    }



    public function delete(Role $role)
    {
        $role->delete();

        return back();
    }




}
