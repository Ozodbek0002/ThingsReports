<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Product;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\History;
use Illuminate\Support\Facades\DB;


class SearchController extends Controller
{
    public function SearchHistory(Request $request)
    {
        $histories = History::whereDate('created_at', '>=', $request->from_date)->whereDate('created_at', '<=', $request->to_date)->paginate(10);
        return view('admin.transactions.index', [
            'histories' => $histories,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
        ]);

    }

    public function SearchHistories(Request $request){
        $histories = History::where('name', 'like', '%' . $request->search . '%')->paginate(10);
        return view('admin.transactions.index', [
            'histories' => $histories,
        ]);
    }

    public function SearchProduct(Request $request)
    {
        $products = Product::whereDate('created_at', '>=', $request->from_date)->whereDate('created_at', '<=', $request->to_date)->paginate(10);

        return view('admin.products.index', [
            'products' => $products,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'user'=>null,
        ]);

    }


    public function SearchProducts(Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->search . '%')->paginate(10);
        return view('admin.products.index', [
            'products' => $products,
            'user'=>null,
        ]);

    }


//    Rooms
    public function SearchRooms(Request $request){
        $rooms = Room::where('name', 'like', '%' . $request->search . '%')->paginate(10);
        $departments = Department::all()->except(1);
        return view('admin.rooms.index',[
            'rooms'=>$rooms,
            'departments'=>$departments,
        ]);
    }

//    Users

    public function SearchUsers(Request $request)
    {
        $users = User::where('name', 'like', '%' . $request->search . '%')->paginate(10);
        return view('admin.users.index', [
            'users' => $users,
        ]);

    }



    public function ShowUserProducts($id)
    {
        $user = User::find($id);
        $roomIds = $user->rooms->pluck('id')->toArray();

        $paginatedProducts = DB::table('products')
            ->whereIn('room_id', $roomIds)
            ->paginate(10); // 10 ta mahsulotni bir sahifada ko'rsatish uchun

        return view('admin.products.index', [
            'products' => $paginatedProducts,
            'user'=>$user,
        ]);
    }

}
