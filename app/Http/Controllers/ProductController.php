<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all()->sortByDesc('id')->paginate(10);
        return view('admin.products.index',[
            'products'=>$products,
        ]);
    }


    public function create()
    {
        return view('admin.products.create');
    }


    public function store(StoreProductRequest $request)
    {
        //
    }


    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        //
    }


    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }


    public function destroy(Product $product)
    {
        //
    }
}
