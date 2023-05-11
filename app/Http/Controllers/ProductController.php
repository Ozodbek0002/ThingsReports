<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\File;
use App\Models\{ Product,Category,Unit,User, Department,Room };

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
        $users = User::all();
        $departments = Department::all();
        return view('admin.products.create', [
            'categories'=>$categories,
            'units'=>$units,
            'users'=>$users,
            'departments'=>$departments,
        ]);
    }


    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->code = $request->code;
        $product->category_id = $request->category_id;
        $product->unit_id = $request->unit_id;
        $product->amount = $request->amount;
        $product->room_id = $request->room_id;

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
        $rooms = Room::all();
        return view('admin.products.edit', [
            'product'=>$product,
            'categories'=>$categories,
            'units'=>$units,
            'rooms'=>$rooms,
        ]);
    }


    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->name = $request->name;
        $product->code = $request->code;
        $product->category_id = $request->category_id;
        $product->unit_id = $request->unit_id;
        $product->amount = $request->amount;
        $product->room_id = $request->room_id;

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
        $image_path = public_path("products/{$product->image}");

        if (Product::exists($image_path)) {
            File::delete($image_path);
        }

        $product->delete();
        return redirect()->route('admin.products')->with('msg', 'Mahsulot muvaffaqiyatli o`chirildi.');

    }
}
