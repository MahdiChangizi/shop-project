<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Admin\Category;


class CategoryController extends Controller
{

    /* -- return view categories -- */
    public function index() {
        $categories = Category::Paginate(10);
        return view('admin.category.index', compact('categories'));
    }




    /* -- return view create -- */
    public function create() {
        $categories = Category::all();
        return view('admin.category.create', compact('categories'));
    }




    /* -- create a category -- */
    public function store(CategoryRequest $request) {
        $inputs = $request->all();
        Category::create($inputs);
        return to_route('admin.category.index')->with('alert-success', 'دسته بندی شما با موفقیت اضافه شد');
    }





    /* -- return view edit -- */
    public function edit(Category $category) {
        $allCategories = Category::whereNot('id', $category->id);
        return view('admin.category.edit', compact('category', 'allCategories'));
    }





    /* -- update a category -- */
    public function update(Category $category, CategoryRequest $categoryRequest) {
        $inputs = $categoryRequest->all();
        $inputs['parent_id'] = $categoryRequest->parent_id;
        $result = $category->update($inputs);
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
