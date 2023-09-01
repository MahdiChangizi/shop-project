<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Provinces_and_city;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function index()
    {
        $provinces = Provinces_and_city::where('parent_id', null)->simplePaginate(10);
        return view('admin.province-and-city.province.index', compact('provinces'));
    }



    public function create()
    {
        return view('admin.province-and-city.province.create');
    }



    public function store(Request $request)
    {
        $inputs = $request->validate([
            'name' => ['required', 'min:5', 'max:20'],
            'status' => ['required', 'in:0,1', 'numeric']
        ]);

        Provinces_and_city::create($inputs);

        return to_route('admin.province.index')->with('alert-success', 'استان جدید با موفقیت ایجاد شد!');
    }



    public function edit(Provinces_and_city $province)
    {
        return view('admin.province-and-city.province.edit', compact('province'));
    }



    public function update(Provinces_and_city $province, Request $request)
    {
        $inputs = $request->validate([
            'name' => ['required', 'min:5', 'max:20'],
            'status' => ['required', 'in:0,1', 'numeric']
        ]);

        $province->update($inputs);

        return to_route('admin.province.index')->with('alert-success', 'استان شما با موفقیت ویرایش شد!');
    }



    public function delete(Provinces_and_city $province)
    {
        $province->delete();

        return back();
    }





    public function status(Provinces_and_city $province)
    {
        $province->status = $province->status == 0 ? 1 : 0;
        $province->save();
        return back()->with('alert-success', 'وضعیت استان با موفقیت تغییر کرد!');
    }
}
