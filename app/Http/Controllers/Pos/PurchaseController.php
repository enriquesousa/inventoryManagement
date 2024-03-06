<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Purchase;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class PurchaseController extends Controller
{
    // ListPurchase
    public function ListPurchase(){
        $allData = Purchase::orderBy('date','desc')->orderBy('id','desc')->get();
        return view('backend.purchase.list_purchase',compact('allData'));
    }

    // AddPurchase
    public function AddPurchase(){

       $suppliers = Supplier::all();
       $categories = Category::all();
       $units = Unit::all();
        
       return view('backend.purchase.add_purchase',compact('suppliers','categories','units'));
    }



}
