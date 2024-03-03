<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class SupplierController extends Controller
{
    
    // ListSupplier
    public function ListSupplier(){
        $suppliers = Supplier::latest()->get();
        return view('backend.supplier.list_supplier', compact('suppliers'));
    }


    // AddSupplier
    public function AddSupplier(){
        return view('backend.supplier.add_supplier');
    }


    // StoreSupplier
    public function StoreSupplier(Request $request){
     
        Supplier::insert([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Proveedor Guardado Correctamente',
            'alert-type' => 'success'
        );

        return redirect()->route('list.supplier')->with($notification);

    }



}
