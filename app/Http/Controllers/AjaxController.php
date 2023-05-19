<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{History, User, Department, Room};
use Yajra\DataTables\Services\DataTable;

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


    public function HistoriesDatatable(Request $request){
        $histories = History::all();

            return DataTable::of($histories)
                ->addColumn('action',function ($row){
                 return '<a  class="btn btn-info " >  test </a>';
                })
                ->rawColumns(['action'])
                ->make(true);

    }

}
