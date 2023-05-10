<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Http\Requests\StoreHistoryRequest;
use App\Http\Requests\UpdateHistoryRequest;
use App\Models\Product;
use App\Models\User;


class HistoryController extends Controller
{

    public function index()
    {
        $histories = History::paginate(5);
        return view('admin.transactions.index', [
            'histories' => $histories,
        ]);
    }


    public function create()
    {
        $users = User::all();
        $products = Product::all();
        return view('admin.transactions.create', [
            'users' => $users,
            'products' => $products,
        ]);
    }


    public function store(StoreHistoryRequest $request)
    {
        if ($request->from_user_id == $request->to_user_id) {
            return redirect()->route('admin.transactions')->withErrors( 'Hodimni o`zidan yana o`ziga o`tkazma amalga oshmaydi.');
        } else {
            History::create($request->all());
            return redirect()->route('admin.transactions')->with('msg', 'O`tkazma muvaffaqiyatli amalga oshirildi.');
        }
    }


    public function show(History $history)
    {
        //
    }


    public function edit(History $history)
    {
        $users = User::all();
        $products = Product::all();
        return view('admin.transactions.edit', [
            'history' => $history,
            'users' => $users,
            'products' => $products,
        ]);
    }


    public function update(UpdateHistoryRequest $request, History $history)
    {
        $history->update($request->all());
        return redirect()->route('admin.transactions');
    }


    public function destroy(History $history)
    {
        $history->delete();
        return redirect()->route('admin.transactions')->with('msg', ' Aperatsiya muvaffaqiyatli o`chirildi.');
    }
}
