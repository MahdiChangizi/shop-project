<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{



    public function index()
    {
        $permissions = Permission::simplePaginate(10);
        return view('admin.permission.index', compact('permissions'));
    }



    public function create()
    {
        return view('admin.permission.create');
    }



    public function store(Request $request)
    {
        $inputs = $request->validate([
            'name' => ['required', 'min:5', 'max:20']
        ]);

        Permission::create($inputs);

        return to_route('admin.permission.index')->with('alert-success', 'دسترسی جدید با موفقیت ایجاد شد!');
    }



    public function edit(Permission $permission)
    {
        return view('admin.permission.edit', compact('permission'));
    }



    public function update(Permission $permission, Request $request)
    {
        $inputs = $request->validate([
            'name' => ['required', 'min:5', 'max:20']
        ]);

        $permission->update($inputs);

        return to_route('admin.permission.index')->with('alert-success', 'دسترسی شما با موفقیت ویرایش شد!');
    }



    public function delete(Permission $permission)
    {
        $permission->delete();

        return back();
    }





}
