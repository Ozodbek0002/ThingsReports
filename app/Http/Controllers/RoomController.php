<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Room;
use App\Models\Department;
use App\Http\Requests\StoreRoomsRequest;
use App\Http\Requests\UpdateRoomsRequest;
use App\Models\User;
use http\Env\Request;

class RoomController extends Controller
{

    public function index(   )
    {
        $rooms = Room::all();
        $departments = Department::all()->except(1);
        return view('admin.rooms.index',[
            'rooms'=>$rooms,
            'departments'=>$departments,
        ]);
    }

    public function  whose($id){
        $rooms = Room::where('department_id', $id)->get();
        return view('admin.rooms.index',[
            'rooms'=>$rooms,
        ]);
    }


    public function create()
    {
        //
    }


    public function store(StoreRoomsRequest $request)
    {
        Room::create($request->all());
        return redirect()->route('admin.rooms')->with('msg', 'Xona muvaffaqiyatli qo`shildi.');
    }


    public function show($id)
    {
        $products = Product::where('room_id', $id)->paginate(5);
        return view('admin.products.index', [
            'products'=>$products,
        ]);
    }


    public function edit()
    {
    }


    public function update(UpdateRoomsRequest $request, $id)
    {
        Room::find($id)->update($request->all());
        return redirect()->route('admin.rooms')->with('msg', 'Xona muvaffaqiyatli tahrirlandi.');
    }


    public function destroy($id)
    {
        Room::find($id)->delete();
        return redirect()->route('admin.rooms')->with('msg', 'Xona muvaffaqiyatli o`chirildi.');
    }
}
