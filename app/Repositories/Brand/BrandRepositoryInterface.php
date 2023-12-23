<?php

namespace App\Repositories\Brand;
use Illuminate\Http\Request;

interface BrandRepositoryInterface
{
    public function index();

    public function store(Request $request, $image_name);

    public function update($brand, $request);

    public function delete($brand);

    public function status($brand);
}
