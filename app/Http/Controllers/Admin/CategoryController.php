<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryStoreRequest;
use App\Http\Requests\Admin\Category\CategoryUpdateRequest;
use App\Models\Admin\Category;


class CategoryController extends Controller
{
    /* -- return view categories -- */
    public function index() {
        if (request('search')){
            $categories = Category::select(['id', 'name', 'slug', 'parent_id', 'status', 'description'])->where('name', 'like', '%' . request('search')  . '%')->Paginate();
        }   else {
            $categories = Category::select(['id', 'name', 'slug', 'parent_id', 'status', 'description'])->Paginate();
        }
        return view('admin.category.index', compact('categories'));
    }

    /* -- return view create -- */
    public function create() {
        $categories = Category::select(['id', 'name'])->get();
        return view('admin.category.create', compact('categories'));
    }

    /* -- create a category -- */
    public function store(CategoryStoreRequest $request) {
        $inputs = $request->all();
        Category::create($inputs);
        return to_route('admin.category.index')->with('alert-success', 'دسته بندی شما با موفقیت اضافه شد');
    }

    /* -- return view edit -- */
    public function edit(Category $category) {
        $allCategories = Category::select(['id', 'name'])->whereNot('id', $category->id)->get();
        return view('admin.category.edit', compact('category', 'allCategories'));
    }

    /* -- update a category -- */
    public function update(Category $category, CategoryUpdateRequest $categoryRequest) {
        $category->update([
            'name'        => $categoryRequest->name,
            'description' => $categoryRequest->description,
            'status'      => $categoryRequest->status,
            'parent_id'   => $categoryRequest->parent_id,
        ]);
        return to_route('admin.category.index')->with('alert-success', 'دسته بندی شما با موفقیت ویرایش شد');
    }

    /* -- delete -- */
    public function delete(Category $category) {
        $category->delete();
        return back();
    }

     /* -- change status -- */
    public function status(Category $category) {
        $category->status = $category->status == 1 ? 0 : 1;
        $category->save();
        return to_route('admin.category.index')->with('alert-success', 'وضعیت دسته بندی شما با موفقیت تغییر کرد !');
    }
}
