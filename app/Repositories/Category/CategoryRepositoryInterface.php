<?php

namespace App\Repositories\Category;

use App\Repositories\EloquentRepositoryInterface;

interface CategoryRepositoryInterface extends EloquentRepositoryInterface
{
    public function getAllCategoriesByFilters();

}
