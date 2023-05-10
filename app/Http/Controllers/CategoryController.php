<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

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

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin.categories')->with('msg', 'Kategoriya muvaffaqiyatli qo`shildi.');
    }


    public function show(Category $category)
    {
        //
    }


    public function edit(Category $category)
    {
        //
    }


    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin.categories')->with('msg', 'Kategoriya muvaffaqiyatli tahrirlandi.');
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories')->with('msg', 'Kategoriya muvaffaqiyatli o`chirildi.');
    }
}
