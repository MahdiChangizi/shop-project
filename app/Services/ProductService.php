<?php

namespace App\Services;

use App\Repositories\Product\ProductRepositoryInterface;

class ProductService
{
    protected ProductRepositoryInterface $productRepository;

    public function __construct()
    {
        $this->productRepository = app()->make(ProductRepositoryInterface::class);
    }

    public function create($productRequest, $saveImage)
    {
        $inputs = $productRequest->all();
        $image = $productRequest->file('image');
        $saveImage->save($image, 'Products');
        $inputs['image'] = $saveImage->saveImageDb();

        $this->productRepository->create($inputs, $image);
    }
}
