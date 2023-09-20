<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\City\CityStoreRequest;
use App\Http\Requests\Admin\City\CityUpdateRequest;
use App\Models\Admin\Provinces_and_city;

class CityController extends Controller
{
    public function index()
    {
        $cities = Provinces_and_city::where('parent_id', '!=', null)->Paginate(10);
        return view('admin.province-and-city.city.index', compact('cities'));
    }



    public function create()
    {
        $provinces = Provinces_and_city::where('parent_id', null)->get();
        return view('admin.province-and-city.city.create', compact('provinces'));
    }



    public function store(CityStoreRequest $request)
    {
        $inputs = $request->all();
        Provinces_and_city::create($inputs);

        return to_route('admin.city.index')->with('alert-success', 'شهر جدید با موفقیت ایجاد شد!');
    }



    public function edit(Provinces_and_city $city)
    {
        $provinces = Provinces_and_city::where('parent_id', null)->get();
        return view('admin.province-and-city.city.edit', compact('city', 'provinces'));
    }



    public function update(Provinces_and_city $city, CityUpdateRequest $request)
    {
        $inputs = $request->all();
        $city->update($inputs);

        return to_route('admin.city.index')->with('alert-success', 'شهر شما با موفقیت ویرایش شد!');
    }



    public function delete(Provinces_and_city $city)
    {
        $city->delete();

        return back();
    }





    public function status(Provinces_and_city $city)
    {
        $city->status = $city->status == 0 ? 1 : 0;
        $city->save();
        return back()->with('alert-success', 'وضعیت شهر با موفقیت تغییر کرد!');
    }
}
