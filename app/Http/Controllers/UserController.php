<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', [
            'users'=>$users,
        ]);
    }


    public function create()
    {
        return view('users.create');
    }


    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('msg','hodim muavvaqiyatli o`chirildi');
    }
}
