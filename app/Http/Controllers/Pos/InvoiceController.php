<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\Purchase;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Payment;
use App\Models\PaymentDetail;

class InvoiceController extends Controller
{
    // ListInvoice
    public function ListInvoice(){
        $allData = Invoice::orderBy('date', 'desc')->orderBy('id', 'desc')->get();
        return view('backend.invoice.list_invoice', compact('allData'));
    }

    // AddInvoice
    public function AddInvoice(){

        $categories = Category::all();

        $invoice_data = Invoice::orderBy('id', 'desc')->first();
        if ($invoice_data == null) {
            $first_reg = '1';
            $invoice_no = str_pad($first_reg, 4, '0', STR_PAD_LEFT);
        }else{
            $invoice_data = Invoice::orderBy('id', 'desc')->first();
            $invoice_no = $invoice_data->invoice_no;
            $invoice_no = $invoice_no+1;
            $invoice_no = str_pad($invoice_no, 4, '0', STR_PAD_LEFT);
        }
        
        $date = date('Y-m-d');

        return view('backend.invoice.add_invoice', compact('categories', 'invoice_no', 'date'));
    }




    
}
