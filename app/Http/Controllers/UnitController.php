<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;

class UnitController extends Controller
{

    public function index()
    {
        $units = Unit::all();
        return view('admin.units.index',[
            'units'=>$units,
        ]);
    }


    public function create()
    {
        //
    }


    public function store(StoreUnitRequest $request)
    {
        $unit = new Unit();
        $unit->name = $request->name;
        $unit->save();

        return redirect()->route('admin.units')->with('msg', 'O`lchov birligi muvaffaqiyatli qo`shildi.');
    }


    public function show(Unit $unit)
    {
        //
    }


    public function edit(Unit $unit)
    {
        //
    }


    public function update(UpdateUnitRequest $request, Unit $unit)
    {
        $unit->name = $request->name;
        $unit->save();

        return redirect()->route('admin.units')->with('msg', 'O`lchov birligi muvaffaqiyatli tahrirlandi.');
    }

    public function destroy(Unit $unit)
    {
        $unit->delete();
        return redirect()->route('admin.units')->with('msg', 'O`lchov birligi muvaffaqiyatli o`chirildi.');
    }
}
