<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BrandRequest;
use App\Models\Admin\Brand;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::simplePaginate(10);
        return view('admin.brand.index', compact('brands'));
    }



    public function create()
    {
        return view('admin.brand.create');
    }



    public function store(BrandRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();

        $image = $request->file('logo');
        $imageService->save($image, 'Brands');
        $inputs['logo'] = $imageService->saveImageDb();

        Brand::create($inputs);
        return to_route('admin.brand.index')->with('alert-success', 'برند شما با موفقیت اضافه شد!');
    }




    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }


    public function update(Brand $brand, BrandRequest $brandRequest, ImageService $imageService)
    {
        $inputs = $brandRequest->all();

        if($brandRequest->hasFile('logo'))
        {
            File::delete(public_path($brand->logo));
            $image = $brandRequest->file('logo');
            $imageService->save($image, 'Brands');
            $inputs['logo'] = $imageService->saveImageDb();
        }

        $brand->update($inputs);
        return to_route('admin.brand.index')->with('alert-success', 'برند شما با موفقیت ویرایش شد!');
    }


    public function delete(Brand $brand)
    {
        File::delete(public_path($brand->logo));
        $brand->delete();
        return back();
    }


    /* -- change status -- */
    public function status(Brand $brand) {
        $brand->status = $brand->status == 1 ? 0 : 1;
        $brand->save();
        return to_route('admin.brand.index')->with('alert-success', 'وضعیت برند شما با موفقیت تغییر کرد !');
    }


}
