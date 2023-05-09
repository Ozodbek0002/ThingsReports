<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Unit;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::paginate(5);
        return view('admin.products.index',[
            'products'=>$products,
        ]);
    }


    public function create()
    {
        $categories = Category::all();
        $units = Unit::all();
        return view('admin.products.create', [
            'categories'=>$categories,
            'units'=>$units,
        ]);
    }


    public function store(StoreProductRequest $request)
    {

        $product = new Product();
        $product->name = $request->name;
        $product->code = $request->code;
        $product->category_id = $request->category_id;
        $product->unit_id = $request->unit_id;
        $product->count = $request->count;
        $product->user_id = 1;

        $imagename = $request->file('image')->getClientOriginalName();
        $request->image->move('products', $imagename);
        $product->image = $imagename;

        $product->save();
        return redirect()->route('admin.products')->with('msg', 'Mahsulot muvaffaqiyatli qo`shildi.');
    }


    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        $categories = Category::all();
        $units = Unit::all();
        return view('admin.products.edit', [
            'product'=>$product,
            'categories'=>$categories,
            'units'=>$units,
        ]);
    }


    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->name = $request->name;
        $product->code = $request->code;
        $product->category_id = $request->category_id;
        $product->unit_id = $request->unit_id;
        $product->count = $request->count;
        $product->user_id = 1;

        if ($request->image != null) {

            $image_path = public_path("products/{$product->image}");

            if (Product::exists($image_path)) {
                File::delete($image_path);
            }

            $imagename = $request->file('image')->getClientOriginalName();
            $request->image->move('products', $imagename);
            $product->image = $imagename;
        }

        $product->save();
        return redirect()->route('admin.products')->with('msg', 'Mahsulot muvaffaqiyatli yangilandi.');
    }


    public function destroy(Product $product)
    {
        //
    }
}
