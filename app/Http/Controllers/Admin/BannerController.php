<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerRequest;
use App\Models\Admin\Banner;
use App\Services\ImageService;
use Illuminate\Http\Request;

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



    public function store(BannerRequest $bannerRequest, ImageService $imageService)
    {
        $inputs = $bannerRequest->all();

        $file = $bannerRequest->file('image');
        $imageService->save($file);
        $inputs['image'] = $imageService->saveImageDb();

        $banner = Banner::create($inputs);
        return to_route('admin.banner.index')->with('alert-success', 'بنر شما با موفقیت اضافه شد!');
    }



    public function edit()
    {

    }



    public function update()
    {

    }



    public function status(Banner $banner)
    {
        $banner->status = $banner->status == 1 ? 0 : 1;
        $banner->save();
        return to_route('admin.banner.index')->with('alert-success', 'وضعیت بنر شما با موفقیت تغییر کرد !');
    }




}
