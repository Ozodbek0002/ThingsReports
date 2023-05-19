<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\File;
use App\Models\{History, Product, Category, Unit, User, Department, Room};

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index', [
            'products' => $products,
        ]);
    }


    public function create()
    {
        $categories = Category::all();
        $units = Unit::all();
        $users = User::all()->except(1);
        $departments = Department::all()->except(1);
        return view('admin.products.create', [
            'categories' => $categories,
            'units' => $units,
            'users' => $users,
            'departments' => $departments,
        ]);
    }


    public function store(StoreProductRequest $request)
    {
        if ($request->user_id == auth()->user()->id || auth()->user()->role->id == 1) {
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
        else {
            return redirect()->route('admin.products')->withErrors('Siz faqat o`zingiz uchun yangi mahsulot qo`sha olasiz.');
        }
    }



    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.products.show', [
            'product' => $product,
        ]);
    }


    public function edit(Product $product)
    {
        $historyproduct = History::find($product->id, 'product_id');
        if ($historyproduct != null ){


        if (  $product->room->user->id == auth()->user()->id || auth()->user()->role->id == 1  ) {
            $categories = Category::all();
            $units = Unit::all();
            $rooms = Room::all();
            return view('admin.products.edit', [
                'product' => $product,
                'categories' => $categories,
                'units' => $units,
                'rooms' => $rooms,
            ]);
        } else {
            return redirect()->route('admin.products')->withErrors('Sizda bunday huquq yo`q.');
        }
        }
        else{
            return redirect()->route('admin.products')->withErrors('Siz bu mahsulotni endi tahrirlay olmaysiz chunki buni ustida operatsiya bajarilgan.');
        }

    }


    public function update(UpdateProductRequest $request, Product $product)
    {
        if ($product->room->user->id == auth()->user()->id || auth()->user()->role->id == 1) {
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
        } else {
            return redirect()->route('admin.products')->withErrors('Sizda bunday huquq yo`q.');

        }

    }


    public function destroy(Product $product)
    {
        if ( auth()->user()->role->id == 1) {

            $image_path = public_path("products/{$product->image}");

            if (Product::exists($image_path)) {
                File::delete($image_path);
            }

            $product->delete();
            return redirect()->route('admin.products')->with('msg', 'Mahsulot muvaffaqiyatli o`chirildi.');
        } else {
            return redirect()->route('admin.products')->withErrors('Sizda bunday huquq yo`q.');
        }

    }
}
