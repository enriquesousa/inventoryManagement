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

class DefaultController extends Controller
{
    // GetCategory
    public function GetCategory(Request $request){
        
        $supplier_id = $request->supplier_id;
        // dd($supplier_id);

        // $allCategory = Product::where('supplier_id',$supplier_id)->get();
        // dd($allCategory);

        // Para agrupar por categorías
        // $allCategory = Product::select('category_id')->where('supplier_id',$supplier_id)->groupBy('category_id')->get();
        // dd($allCategory);

        // Para agrupar por categorías, llamando a la función category del modelo para obtener el nombre de la categoría
        $allCategory = Product::with('category')->select('category_id')->where('supplier_id',$supplier_id)->groupBy('category_id')->get();
        // dd($allCategory);

        return response()->json($allCategory);
    }

    // GetProduct
    public function GetProduct(Request $request){

        $category_id = $request->category_id;
        $supplier_id = $request->supplier_id;

        $allProduct = Product::where('supplier_id',$supplier_id)->where('category_id',$category_id)->get();
        
        return response()->json($allProduct);
    }

    // GetProductCategory
    public function GetProductCategory(Request $request){
        $category_id = $request->category_id;
        $allProduct = Product::where('category_id',$category_id)->get();
        
        return response()->json($allProduct);
    }

    // GetProductStock
    public function GetProductStock(Request $request){

        $product_id = $request->product_id;
        $stock = Product::where('id',$product_id)->first()->quantity;
        
        return response()->json($stock);
    }



}
