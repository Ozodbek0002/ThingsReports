<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', [
            'roles' => $roles,
        ]);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {


        $role = Role::create($request->all());
        return redirect()->route('admin.roles')->with('msg', 'Yangi lavozim muvaffaqiyatli qo`shildi.');
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
        $role = Role::find($id);
        $role->update($request->all());
        return redirect()->route('admin.roles')->with('msg', 'Lavozim muvaffaqiyatli yangilandi.');
    }


    public function destroy(string $id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('admin.roles')->with('msg', 'Lavozim muvaffaqiyatli o`chirildi.');
    }
}
