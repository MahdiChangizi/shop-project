<?php

namespace App\Repositories\Product;

interface ProductRepositoryInterface
{
    public function getDataForIndexProduct();

    public function getCategories();

    public function getBrands();

    public function create($inputs, $image);
}
