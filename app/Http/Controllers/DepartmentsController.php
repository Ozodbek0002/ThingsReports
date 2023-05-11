<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Requests\StoreDepartmentsRequest;
use App\Http\Requests\UpdateDepartmentsRequest;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $departments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $departments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentsRequest $request, Department $departments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $departments)
    {
        //
    }
}
