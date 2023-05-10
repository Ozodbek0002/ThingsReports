<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function userProducts($id){
        if ($id== 0) {
            return response()->json([]);
        }
        $user = User::find($id);
        return response()->json($user->products);
    }

}
