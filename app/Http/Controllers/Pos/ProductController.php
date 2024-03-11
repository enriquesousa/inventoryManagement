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

    // ListProductCategory
    public function ListProductCategory(){
        $products = Product::orderBy('category_id','DESC')->orderBy('supplier_id','DESC')->get();
        return view('backend.product.list_product',compact('products'));
    }

    // ListProductSupplier
    public function ListProductSupplier(){
        $products = Product::orderBy('supplier_id','DESC')->orderBy('category_id','DESC')->get();
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

    // EditProduct
    public function EditProduct($id){
        $product = Product::findOrFail($id);
        $suppliers = Supplier::latest()->get();
        $categories = Category::latest()->get();
        $units = Unit::latest()->get();
        return view('backend.product.edit_product',compact('product','suppliers','categories','units'));
    }

    // UpdateProduct
    public function UpdateProduct(Request $request){

        $product_id = $request->id;

        Product::findOrFail($product_id)->update([
            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'category_id' => $request->category_id,
            'unit_id' => $request->unit_id,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Producto Actualizado Correctamente',
            'alert-type' => 'success'
        );
        
        return redirect()->route('list.product')->with($notification);

    }

    // DeleteProduct
    public function DeleteProduct($id){

        Product::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Producto Eliminado Correctamente',
            'alert-type' => 'success'
        );
        
        return redirect()->back()->with($notification);
    }



}
