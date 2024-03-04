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



}
