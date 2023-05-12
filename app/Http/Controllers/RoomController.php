<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Department;
use App\Http\Requests\StoreRoomsRequest;
use App\Http\Requests\UpdateRoomsRequest;

class RoomController extends Controller
{

    public function index()
    {
        $rooms = Room::all();
        $departments = Department::all();
        return view('admin.rooms.index',[
            'rooms'=>$rooms,
            'departments'=>$departments,
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
        $room = Room::find($id);
        return view('admin.rooms.show', [
            'room'=>$room,
        ]);
    }


    public function edit(Room $rooms)
    {
        //
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
