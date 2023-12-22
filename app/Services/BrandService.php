<?php

namespace App\Services;

use App\Models\Admin\Brand;
use App\Repositories\Brand\BrandRepositoryInterface;

class BrandService
{
    protected BrandRepositoryInterface $brandRepository;
    public function __construct()
    {
        $this->brandRepository = app()->make(BrandRepositoryInterface::class);
    }


    public function store($request)
    {
        $logo = $request->file('logo');
        $image_name = time() . '-' . trim($logo->getClientOriginalName());
        $logo->move('adm/products/images', $image_name);
        return $this->brandRepository->store($request, $image_name);
    }
}
