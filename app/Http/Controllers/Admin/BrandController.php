<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brand\brandStoreRequest;
use App\Http\Requests\Admin\Brand\brandUpdateRequest;
use App\Models\Admin\Brand;
use App\Services\SaveImage;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::Paginate(10);
        return view('admin.brand.index', compact('brands'));
    }



    public function create()
    {
        return view('admin.brand.create');
    }



    public function store(brandStoreRequest $request, SaveImage $saveImage)
    {
        $inputs = $request->all();

        $image = $request->file('logo');
        $saveImage->save($image, 'Brands');
        $inputs['logo'] = $saveImage->saveImageDb();

        Brand::create($inputs);
        return to_route('admin.brand.index')->with('alert-success', 'برند شما با موفقیت اضافه شد!');
    }




    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }


    public function update(Brand $brand, brandUpdateRequest $brandRequest, SaveImage $saveImage)
    {
        $inputs = $brandRequest->all();

        if($brandRequest->hasFile('logo'))
        {
            File::delete(public_path($brand->logo));
            $image = $brandRequest->file('logo');
            $saveImage->save($image, 'Brands');
            $inputs['logo'] = $saveImage->saveImageDb();
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
