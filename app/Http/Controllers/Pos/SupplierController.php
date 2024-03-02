<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    
    // ListSupplier
    public function ListSupplier(){
        return view('backend.supplier.list_supplier');
    }





}
