<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class UnitController extends Controller
{
    // ListUnit
    public function ListUnit(){
        $units = Unit::latest()->get();
        return view('backend.unit.list_unit', compact('units'));
    }

    // AddUnit
    public function AddUnit(){
        return view('backend.unit.add_unit');
    }

    // StoreUnit
    public function StoreUnit(Request $request){

        Unit::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Unidad Agregada Correctamente',
            'alert-type' => 'success'
        );

        return Redirect()->route('list.unit')->with($notification);
    }



}
