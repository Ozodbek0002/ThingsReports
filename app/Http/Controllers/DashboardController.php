<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Product, Category, Department, Room, Unit, History};


class DashboardController extends Controller
{
    public function dashboard()
    {
        $rooms = Room::all();
        $departments = Department::all()->except(1);
        $users = User::all()->except(1);
        $products = Product::all();
        return view('admin.dashboard', [
            'departments' => $departments,
            'users' => $users,
            'rooms' => $rooms,
            'products' => $products,
        ]);
    }
}
