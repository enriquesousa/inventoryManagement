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


}
