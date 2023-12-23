<?php

namespace App\Repositories\Category;

use App\Filters\CategoryFilter;
use App\Models\Admin\Category;
use App\Repositories\BaseRepository;
use Illuminate\Support\Collection;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $category)
    {
        parent::__construct(model: $category);
    }
    public function getAllCategoriesByFilters()
    {
        $queryParams = [
            'q' => request()->q,
            'status' => request()->status,
        ];
        return (new CategoryFilter(queryParams: $queryParams, per_page: 15))->getResult();
    }
    public function gettingDataOtherThanItself(Category $category): Collection
    {
        return Category::whereNotIn('id', [$category->id])->get();
    }
    public function status(Category $category): void
    {
        $category->status = $category->status == 1 ? 0 : 1;
        $category->save();
    }
    public function create(array $attributes): Category
    {
        return $this->model->create(attributes: $attributes);
    }
    public function update(array $attributes, int $id): bool
    {
        return $this->model->update(attributes: $attributes);
    }
    public function delete(int $id): ?bool
    {
        return $this->find(id: $id)->delete();
    }
}
