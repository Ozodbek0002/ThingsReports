<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\History;

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

    public function SearchProduct(Request $request){
        $products = Product::whereDate('created_at', '>=', $request->from_date)->whereDate('created_at', '<=', $request->to_date)->paginate(10);

        return view('admin.products.index',[
            'products'=>$products,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
        ]);

    }


}
