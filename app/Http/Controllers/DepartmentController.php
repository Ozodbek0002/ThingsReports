<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Requests\StoreDepartmentsRequest;
use App\Http\Requests\UpdateDepartmentsRequest;

class DepartmentController extends Controller
{

    public function index()
    {
        $departments = Department::all();
        return view('admin.departments.index',[
            'departments'=>$departments,
        ]);
    }


    public function create()
    {
        //
    }


    public function store(StoreDepartmentsRequest $request)
    {
        Department::create($request->all());
        return redirect()->route('admin.departments')->with('msg', 'Bo`lim muvaffaqiyatli qo`shildi.');
    }


    public function show($id)
    {
        $department = Department::find($id);
        return view('admin.departments.show',[
            'department'=>$department,
        ]);
    }


    public function edit(Department $departments)
    {
        //
    }


    public function update(UpdateDepartmentsRequest $request, $id)
    {
        Department::find($id)->update($request->all());
        return redirect()->route('admin.departments')->with('msg', 'Bo`lim muvaffaqiyatli tahrirlandi.');
    }


    public function destroy($id)
    {
        Department::find($id)->delete();
        return redirect()->route('admin.departments')->with('msg', 'Bo`lim muvaffaqiyatli o`chirildi.');
    }
}
