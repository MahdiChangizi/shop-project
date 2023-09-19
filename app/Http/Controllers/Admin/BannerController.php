<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Banner\BannerStoreRequest;
use App\Http\Requests\Admin\Banner\BannerUpdateRequest;
use App\Models\Admin\Banner;
use App\Services\SaveImage;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
    }




    public function create()
    {
        return view('admin.banner.create');
    }



    public function store(BannerStoreRequest $bannerRequest, SaveImage $saveImage)
    {
        $inputs = $bannerRequest->all();

        $file = $bannerRequest->file('image');
        $saveImage->save($file, '/banners/');
        $inputs['image'] = $saveImage->saveImageDb();

        $banner = Banner::create($inputs);
        return redirect()->route('admin.banner.index')->with('alert-success', 'بنر شما با موفقیت اضافه شد!');
    }




    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', compact('banner'));
    }



    public function update(Banner $banner, BannerUpdateRequest $bannerRequest, SaveImage $saveImage)
    {
        $inputs = $bannerRequest->all();

        if ($bannerRequest->hasFile('image')) {
            // delete file
            File::delete(public_path($banner->image));

            // update file
            $file = $bannerRequest->file('image');
            $saveImage->save($file, '/banners/');
            $inputs['image'] = $saveImage->saveImageDb();
        }

        $banner->update($inputs);

        return redirect()->route('admin.banner.index')->with('alert-success', 'بنر شما با موفقیت ویرایش شد!');
    }


    public function delete(Banner $banner)
    {
        File::delete(public_path($banner->image));
        $banner->delete();
        return to_route('admin.banner.index')->with('alert-success', 'بنر شما با موفقیت حذف شد!');
    }



    public function status(Banner $banner)
    {
        $banner->status = $banner->status == 1 ? 0 : 1;
        $banner->save();
        return to_route('admin.banner.index')->with('alert-success', 'وضعیت بنر شما با موفقیت تغییر کرد !');
    }




}
