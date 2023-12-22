<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryStoreRequest;
use App\Http\Requests\Admin\Category\CategoryUpdateRequest;
use App\Models\Admin\Category;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Services\CategoryService;


class CategoryController extends Controller
{
    public function __construct(CategoryRepositoryInterface $categoryRepository,
                                CategoryService             $categoryService)
    {
        $this->categoryRepository = $categoryRepository;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getAllCategoriesByFilters();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->all();
        return view('admin.category.create', compact('categories'));
    }

    public function store(CategoryStoreRequest $request)
    {
        $this->categoryRepository->create($request->toArray());
        return to_route('admin.category.index')->with('alert-success', 'دسته بندی شما با موفقیت اضافه شد');
    }

    public function edit(Category $category)
    {
        $allCategories = $this->categoryService->all();
        return view('admin.category.edit', compact('category', 'allCategories'));
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        $this->categoryService->update($request->toArray(), $id);
        return to_route('admin.category.index')->with('alert-success', 'دسته بندی شما با موفقیت ویرایش شد');
    }

    public function delete($id)
    {
        $this->categoryService->delete($id);
        return back()->with('alert-success', 'دسته بندی شما با موفقیت حذف شد');
    }

    public function status(Category $category)
    {
        $this->categoryService->status($category);
        return to_route('admin.category.index')->with('alert-success', 'وضعیت دسته بندی شما با موفقیت تغییر کرد !');
    }
}
