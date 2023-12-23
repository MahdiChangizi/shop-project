<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryStoreRequest;
use App\Http\Requests\Admin\Category\CategoryUpdateRequest;
use App\Models\Admin\Category;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    private CategoryRepository $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = $this->categoryRepository->getAllCategoriesByFilters();
        return view(view: 'admin.category.index', data: compact(var_name: 'categories'));
    }
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = $this->categoryRepository->all();
        return view(view: 'admin.category.create', data: compact(var_name: 'categories'));
    }
    public function store(CategoryStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->categoryRepository->create(attributes: $request->toArray());
        return to_route(route: 'admin.category.index')->with(key: 'alert-success', value: 'دسته بندی شما با موفقیت اضافه شد');
    }
    public function edit(Category $category): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $allCategories = $this->categoryRepository->gettingDataOtherThanItself(category: $category);
        return view(view: 'admin.category.edit', data: compact('category','allCategories'));
    }
    public function update(CategoryUpdateRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $this->categoryRepository->update(attributes: $request->toArray(), id: $id);
        return to_route(route: 'admin.category.index')->with(key: 'alert-success', value: 'دسته بندی شما با موفقیت ویرایش شد');
    }
    public function delete(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->categoryRepository->delete(id: $id);
        return back()->with(key: 'alert-success', value: 'دسته بندی شما با موفقیت حذف شد');
    }
    public function status(Category $category): \Illuminate\Http\RedirectResponse
    {
        $this->categoryRepository->status(category: $category);
        return to_route(route: 'admin.category.index')->with(key: 'alert-success', value: 'وضعیت دسته بندی شما با موفقیت تغییر کرد !');
    }
}
