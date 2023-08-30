<?php

namespace App\Http\Controllers\Coustomer;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $brands = Brand::all();
        $categories = Category::whereNull('parent_id')->get();
        $parents = Category::where('parent_id', '!=', null)->get();
        return view('coustomer.layouts.master', compact('brands', 'categories', 'parents', ));
    }

}
