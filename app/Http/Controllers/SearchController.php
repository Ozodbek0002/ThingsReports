<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
