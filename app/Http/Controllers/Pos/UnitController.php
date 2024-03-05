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

    // EditUnit
    public function EditUnit($id){
        $unit = Unit::findOrFail($id);
        return view('backend.unit.edit_unit', compact('unit'));
    }

    // UpdateUnit
    public function UpdateUnit(Request $request, $id){

        $unit = Unit::findOrFail($id);

        $unit->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Unidad Actualizada Correctamente',
            'alert-type' => 'info'
        );

        return Redirect()->route('list.unit')->with($notification);
    }

    // DeleteUnit
    public function DeleteUnit($id){

        Unit::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Unidad Eliminada Correctamente',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }


}
