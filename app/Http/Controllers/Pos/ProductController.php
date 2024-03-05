<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    
    // ListProduct
    public function ListProduct(){
        $products = Product::latest()->get();
        return view('backend.product.list_product',compact('products'));
    }

    // AddProduct
    public function AddProduct(){
        $suppliers = Supplier::latest()->get();
        $categories = Category::latest()->get();
        $units = Unit::latest()->get();
        return view('backend.product.add_product',compact('suppliers','categories','units'));
    }

    // StoreProduct
    public function StoreProduct(Request $request){

        Product::insert([
            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'category_id' => $request->category_id,
            'unit_id' => $request->unit_id,
            'quantity' => '0',
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Producto Añadido Correctamente',
            'alert-type' => 'success'
        );
        
        return redirect()->route('list.product')->with($notification);
    }



}
