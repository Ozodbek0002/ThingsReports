<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',[
            'categories'=>$categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function store(StoreCategoryRequest $request)
    {
        Gate::authorize('category', auth()->user());

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin.categories')->with('msg', 'Kategoriya muvaffaqiyatli qo`shildi.');
    }


    public function show($id)
    {
        $products = Product::where('category_id', $id)->paginate(5);
        return view('admin.products.index', [
            'products'=>$products,
            'user'=>null,
        ]);
    }


    public function edit(Category $category)
    {
        //
    }


    public function update(UpdateCategoryRequest $request, Category $category)
    {
        Gate::authorize('category', auth()->user());
        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin.categories')->with('msg', 'Kategoriya muvaffaqiyatli tahrirlandi.');
    }


    public function destroy(Category $category)
    {
        Gate::authorize('category', auth()->user());
        $category->delete();
        return redirect()->route('admin.categories')->with('msg', 'Kategoriya muvaffaqiyatli o`chirildi.');
    }
}
