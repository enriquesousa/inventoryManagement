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


class StockController extends Controller
{
    
    // StockReport
    public function StockReport(){
        $allData = Product::orderBy('supplier_id','DESC')->orderBy('category_id','DESC')->get();
        return view('backend.stock.stock_report',compact('allData'));
    }

    // StockReportPdf
    public function StockReportPdf(){
        $allData = Product::orderBy('supplier_id','DESC')->orderBy('category_id','DESC')->get();
        return view('backend.pdf.stock_report_pdf',compact('allData'));
    }


    // StockSupplierWise
    public function StockSupplierWise(){
       $suppliers = Supplier::all();
       $categories = Category::all();
       return view('backend.stock.supplier_product_wise_report',compact('suppliers','categories'));
    }




}
