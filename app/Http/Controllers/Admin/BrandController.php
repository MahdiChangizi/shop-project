<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brand\brandStoreRequest;
use App\Http\Requests\Admin\Brand\brandUpdateRequest;
use App\Models\Admin\Brand;
use App\Repositories\Brand\BrandRepositoryInterface;
use App\Services\BrandService;
use App\Services\SaveImage;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function __construct(BrandRepositoryInterface $brandRepository,
                                BrandService             $brandService)
    {
        $this->brandRepository = $brandRepository;
        $this->brandService = $brandService;
    }

    public function index()
    {
        $brands = $this->brandRepository->index();
        return view('admin.brand.index', compact('brands'));
    }


    public function create()
    {
        return view('admin.brand.create');
    }


    public function store(brandStoreRequest $request)
    {
        $brand = $this->brandService->store($request);
        if ($brand) {
            return to_route('admin.brand.index')->with('alert-success', 'برند شما با موفقیت اضافه شد!');
        } else {
            return back()->withInput();
        }
    }


    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }


    public function update(Brand $brand, brandUpdateRequest $request)
    {

        $this->brandRepository->update($brand, $request);
        return to_route('admin.brand.index')->with('alert-success', 'برند شما با موفقیت ویرایش شد!');
    }


    public function delete(Brand $brand)
    {
        $this->brandRepository->delete($brand);
        return back();
    }


    /* -- change status -- */
    public function status(Brand $brand)
    {
        $this->brandRepository->status($brand);
        return to_route('admin.brand.index')->with('alert-success', 'وضعیت برند شما با موفقیت تغییر کرد !');
    }


}
