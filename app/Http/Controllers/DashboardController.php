<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ User, Product, Category, Unit, History };


class DashboardController extends Controller
{
    public function dashboard()
    {
        $users = User::all();
        $products = Product::all();
        $categories = Category::all();
        return view('admin.dashboard', [
            'users' => $users,
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
