<?php

namespace App\Repositories\Category;

use App\Filters\CategoryFilter;
use App\Models\Admin\Category;
use App\Repositories\BaseRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{

    public function __construct(Category $category)
    {
        parent::__construct($category);
    }

    public function getAllCategoriesByFilters()
    {
        $queryParams = [
            'q' => request()->q,
            'status' => request()->status,
        ];
        return (new CategoryFilter($queryParams, 15))->getResult();
    }

}
