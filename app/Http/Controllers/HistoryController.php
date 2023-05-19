<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Http\Requests\StoreHistoryRequest;
use App\Http\Requests\UpdateHistoryRequest;
use App\Models\Product;
use App\Models\User;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Services\DataTable;


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
        $users = User::all()->except(1);
        $products = Product::all();
        return view('admin.transactions.create', [
            'users' => $users,
            'products' => $products,
        ]);
    }


    public function store(StoreHistoryRequest $request)
    {
        if ($request->from_room_id == $request->to_room_id) {
            return redirect()->route('admin.transactions')->withErrors('Hodimni o`zidan yana o`ziga o`tkazma amalga oshmaydi.');
        } elseif ($request->user_id == auth()->id() || auth()->id() == 1) {
            History::create($request->all());
            $product = Product::find($request->product_id);
            $product->update([
                'room_id' => $request->to_room_id,
            ]);
            return redirect()->route('admin.transactions')->with('msg', 'O`tkazma muvaffaqiyatli amalga oshirildi.');
        } else {
            return redirect()->route('admin.transactions')->withErrors('Siz faqat o`zingizdan O`tkazma o`tkaza olasiz.');

        }
    }


    public function show(History $history)
    {
        //
    }


    public function edit($id)
    {
        $history = History::find($id);
        if ($history->fromRoom->user->id == auth()->user()->id || auth()->user()->id == 1) {
            $users = User::all()->except(1);
            $products = Product::all();
            return view('admin.transactions.edit', [
                'history' => $history,
                'users' => $users,
                'products' => $products,
            ]);
        } else {
            return redirect()->route('admin.transactions')->withErrors('Siz faqat o`zingiz amalga oshirgan O`tkazmani o`zgartrishingiz mumkin.');
        }

    }


    public function update(UpdateHistoryRequest $request, $id)
    {
        $history = History::find($id);
        $product = Product::find($request->product_id);

        if ($request->from_room_id == $request->to_room_id) {
            return redirect()->route('admin.transactions')->withErrors('Hodimni o`zidan yana o`ziga o`tkazma amalga oshmaydi.');
        } elseif ($request->user_id == auth()->id() || auth()->id() == 1) {
            $product->update([
                'room_id' => $request->to_room_id,
            ]);
            $history->update($request->all());
            return redirect()->route('admin.transactions')->with('msg', 'O`tkazma muvaffaqiyatli yangilandi.');
        } else {
            return redirect()->route('admin.transactions')->withErrors('Siz faqat o`zingizdan O`tkazma o`tkaza olasiz.');
        }
    }


    public function destroy($id)
    {
        $history = History::find($id);
        $history->delete();
        return redirect()->route('admin.transactions')->with('msg', ' Aperatsiya muvaffaqiyatli o`chirildi.');
    }
}
