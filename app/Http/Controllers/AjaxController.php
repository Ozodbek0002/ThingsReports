<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;

class AjaxController extends Controller
{
    public function userProducts($id){
        if ($id== 0) {
            return response()->json([]);
        }
        $user = User::find($id);
        return response()->json($user->products);
    }

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

}
