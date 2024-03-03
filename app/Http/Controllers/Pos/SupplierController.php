<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Supplier;

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




}
