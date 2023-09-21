<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Permission\PermissionStoreRequest;
use App\Http\Requests\Admin\Permission\PermissionUpdateRequest;
use App\Models\Admin\Permission;

class PermissionController extends Controller
{



    public function index()
    {
        $permissions = Permission::Paginate(10);
        return view('admin.permission.index', compact('permissions'));
    }



    public function create()
    {
        return view('admin.permission.create');
    }



    public function store(PermissionStoreRequest $request)
    {
        $inputs = $request->all();

        Permission::create($inputs);

        return to_route('admin.permission.index')->with('alert-success', 'دسترسی جدید با موفقیت ایجاد شد!');
    }



    public function edit(Permission $permission)
    {
        return view('admin.permission.edit', compact('permission'));
    }



    public function update(Permission $permission, PermissionUpdateRequest $request)
    {
        $inputs = $request->all();

        $permission->update($inputs);

        return to_route('admin.permission.index')->with('alert-success', 'دسترسی شما با موفقیت ویرایش شد!');
    }



    public function delete(Permission $permission)
    {
        $permission->delete();

        return back();
    }





}
