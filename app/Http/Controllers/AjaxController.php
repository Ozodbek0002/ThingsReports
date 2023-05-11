<?php

namespace App\Http\Controllers;

use App\Models\{ User, Department, Room };

class AjaxController extends Controller
{

    public function departmentUser($id){
        if ($id== 0) {
            return response()->json([]);
        }
        $department = Department::find($id);
        return response()->json($department->users);
    }

    public function userRooms($id){
        if ($id== 0) {
            return response()->json([]);
        }
        $user = User::find($id);
        return response()->json($user->rooms);
    }

    public function roomProducts($id){
        if ($id== 0) {
            return response()->json([]);
        }
        $room = Room::find($id);
        return response()->json($room->products);
    }

}
