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

    // EditCategory
    public function EditCategory($id){
        $category = Category::findOrFail($id);
        return view('backend.category.edit_category', compact('category'));
    }

    // UpdateCategory
    public function UpdateCategory(Request $request, $id){

        $category = Category::findOrFail($id);

        $category->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Categoría Actualizada Correctamente',
            'alert-type' => 'info'
        );

        return Redirect()->route('list.category')->with($notification);
    }

    // DeleteCategory
    public function DeleteCategory($id){

        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Categoría Eliminada Correctamente',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }



}
