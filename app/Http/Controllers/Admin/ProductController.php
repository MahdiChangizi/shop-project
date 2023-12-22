<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductStoreRequest;
use App\Http\Requests\Admin\Product\ProductUpdateRequest;
use App\Models\Admin\Attribute;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Services\ProductService;
use App\Services\SaveImage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function __construct(ProductRepositoryInterface $productRepository,
                                ProductService             $productService)
    {
        $this->productRepository = $productRepository;
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productRepository->getDataForIndexProduct();
        return view('admin.product.index', compact('products'));
    }


    public function create()
    {
        $categories = $this->productRepository->getCategories();
        $brands = $this->productRepository->getBrands();
        return view('admin.product.create', compact('categories', 'brands'));
    }


    public function store(ProductStoreRequest $productRequest, SaveImage $saveImage)
    {
        // create Product
//        $inputs = $productRequest->all();
//        $image = $productRequest->file('image');
//        $saveImage->save($image, 'Products');
//        $inputs['image'] = $saveImage->saveImageDb();

        $this->productService->create($productRequest, $saveImage);
        $product = $this->productRepository->create($inputs);

        if (isset($inputs['attributes'])) {
            $attributes = collect($inputs['attributes']);
            $attributes->each(function ($item) use ($product) {
                if (is_null($item['name']) || is_null($item['value'])) return;

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
        $categories = $this->productRepository->getCategories();
        $brands = $this->productRepository->getBrands();
        return view('admin.product.edit', compact('product', 'categories', 'brands'));
    }


    /**
     * @param ProductUpdateRequest $productRequest
     * @param SaveImage $saveImage
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductUpdateRequest $productRequest, SaveImage $saveImage, int $id)
    {
        // Find the product to update
        $product = Product::findOrFail($id);

        // Update Product data
        $inputs = $productRequest->all();

        // Check if a new image is uploaded
        $newImage = $productRequest->file('image');
        if (!is_null($newImage)) {
            // Save the new image
            $saveImage->save($newImage, 'Products');
            $inputs['image'] = $saveImage->saveImageDb();

            // Delete the old image if necessary
            if (!is_null($product->image)) {
                File::delete(public_path($product->image));
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

        File::delete($product->image);
        $product->delete();

        return back();
    }


    public function status(Product $product)
    {
        $product->status = $product->status == 1 ? 0 : 1;
        $product->save();
        return back()->with('وضعیت محصول شما با موفقیت تغییر کرد!');
    }


    public function attribute(Product $product)
    {
        return view('admin.product.attribute', compact('product'));
    }

}
