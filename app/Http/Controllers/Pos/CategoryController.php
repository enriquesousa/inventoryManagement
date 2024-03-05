<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    // ListCategory
    public function ListCategory(){
        $categories = Category::latest()->get();
        return view('backend.category.list_category', compact('categories'));
    }

    // AddCategory
    public function AddCategory(){
        return view('backend.category.add_category');
    }

    // StoreCategory
    public function StoreCategory(Request $request){

        Category::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Categoría Agregada Correctamente',
            'alert-type' => 'success'
        );

        return Redirect()->route('list.category')->with($notification);

    }



    
}
