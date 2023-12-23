<?php

namespace App\Repositories\Category;

use App\Models\Admin\Category;
use App\Repositories\EloquentRepositoryInterface;
use Illuminate\Support\Collection;

interface CategoryRepositoryInterface extends EloquentRepositoryInterface
{
    public function getAllCategoriesByFilters();
    public function gettingDataOtherThanItself(Category $category): Collection;
}
