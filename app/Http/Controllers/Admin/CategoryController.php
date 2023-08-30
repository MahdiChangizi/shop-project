<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Services\ImageService;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use function PHPUnit\Framework\isNull;

class CategoryController extends Controller
{

    /* -- return view categories -- */
    public function index() {
        $categories = Category::simplePaginate(10);
        return view('admin.category.index', compact('categories'));
    }




    /* -- return view create -- */
    public function create() {
        $categories = Category::all();
        return view('admin.category.create', compact('categories'));
    }




    /* -- create a category -- */
    public function store(CategoryRequest $request, ImageService $imageService) {
        $inputs = $request->all();

        $image = $request->file('image');
        $imageService->save($image, 'categories');
        $inputs['image'] = $imageService->saveImageDb();
        Category::create($inputs);
        return to_route('admin.category.index')->with('alert-success', 'دسته بندی شما با موفقیت اضافه شد');
    }





    /* -- return view edit -- */
    public function edit(Category $category) {
        $allCategories = Category::whereNot('id', $category->id);
        return view('admin.category.edit', compact('category', 'allCategories'));
    }





    /* -- update a category -- */
    public function update(Category $category, CategoryRequest $categoryRequest, ImageService $imageService) {
        $inputs = $categoryRequest->all();
        $inputs['parent_id'] = $categoryRequest->parent_id;
        $image = $categoryRequest->file('image');

        if($categoryRequest->hasFile('image'))
        {
            File::delete(public_path($category->image));
            $imageService->save($image);
            $inputs['image'] = $imageService->saveImageDb();
        }

        $result = $category->update($inputs);

        return to_route('admin.category.index')->with('alert-success', 'دسته بندی شما با موفقیت ویرایش شد');
    }





    /* -- delete -- */
    public function delete(Category $category) {
        File::delete(public_path($category->image));
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
