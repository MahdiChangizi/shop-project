<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Admin\Attribute;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::Paginate(10);
        return view('admin.product.index', compact('products'));
    }




    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.create', compact('categories', 'brands'));
    }




    public function store(ProductRequest $productRequest, ImageService $imageService)
    {
        // create Product
        $inputs = $productRequest->all();
        $image  = $productRequest->file('image');
        $imageService->save($image);
        $inputs['image'] = $imageService->saveImageDb();

        $product = Product::create($inputs);


        if(!is_null($inputs['attributes'])){
            $attributes = collect($inputs['attributes']);
            $attributes->each(function($item) use ($product) {
                if(is_null($item['name']) || is_null($item['value'])) return;

                $attr = Attribute::create([
                    'name' => $item['name']
                ]);


                $attr_value = $attr->values()->create([
                    'value' => $item['value']
                ]);

                $product->attributes()->attach($attr->id, ['value_id' => $attr_value->id]);


            });
        }


        return to_route('admin.product.index')->with('محصول جدید شما با موفقیت اضافه شد!');
    }





    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.edit', compact('product', 'categories', 'brands'));
    }




    public function update(ProductRequest $productRequest, ImageService $imageService, $id)
    {
        // Find the product to update
        $product = Product::findOrFail($id);

        // Update Product data
        $inputs = $productRequest->all();

        // Check if a new image is uploaded
        $newImage = $productRequest->file('image');
        if (!is_null($newImage)) {
            // Save the new image
            $imageService->save($newImage);
            $inputs['image'] = $imageService->saveImageDb();

            // Delete the old image if necessary
            if (!is_null($product->image)) {
                $imageService->delete($product->image); // Assuming you have a method to delete images
            }
        }

        $product->update($inputs);

        // Update attributes
        if (!is_null($inputs['attributes'])) {
            $attributes = collect($inputs['attributes']);
            $attributes->each(function ($item) use ($product) {
                if (is_null($item['name']) || is_null($item['value'])) return;

                $attr = Attribute::firstOrCreate([
                    'name' => $item['name']
                ]);

                $attrValue = $attr->values()->firstOrCreate([
                    'value' => $item['value']
                ]);

                // Sync or attach the attribute and value to the product
                $product->attributes()->syncWithoutDetaching([
                    $attr->id => ['value_id' => $attrValue->id]
                ]);
            });
        }

        return redirect()->route('admin.product.index')->with('success', 'محصول با موفقیت به‌روزرسانی شد!');
    }






    public function delete(Product $product)
{
    $attributes = $product->attributes;

    foreach ($attributes as $attribute) {
        $delete = $product->attributes()->detach($attribute->id);
    }

    $product->delete();

    return back();
}





    public function status(Product $product)
    {
        $product->status =  $product->status == 1 ? 0 : 1;
        $product->save();
        return back()->with('وضعیت محصول شما با موفقیت تغییر کرد!');
    }


    public function attribute(Product $product)
    {
        return view('admin.product.attribute', compact('product'));
    }

}
