<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class CustomerController extends Controller
{
    
    // ListCustomer
    public function ListCustomer(){
        $customers = Customer::latest()->get();
        return view('backend.customer.list_customer', compact('customers'));
    }


}
