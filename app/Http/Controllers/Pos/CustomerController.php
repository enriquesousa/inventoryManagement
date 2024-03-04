<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

use Intervention\Image\ImageManager;

class CustomerController extends Controller
{
    
    // ListCustomer
    public function ListCustomer(){
        $customers = Customer::latest()->get();
        return view('backend.customer.list_customer', compact('customers'));
    }

    // AddCustomer
    public function AddCustomer(){
        return view('backend.customer.add_customer');
    }

    // StoreCustomer
    public function StoreCustomer(Request $request){

        $image = $request->file('customer_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        // create new image instance
        $image = ImageManager::imagick()->read($image);

        // resize to 200 x 200 pixel and save
        $image->resize(200, 200)->save('upload/customer_images/'.$name_gen);

        $save_url = 'upload/customer_images/'.$name_gen;

        Customer::insert([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'customer_image' => $save_url,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Cliente registrado con éxito',
            'alert-type' => 'success'
        );

        return redirect()->route('list.customer')->with($notification);
    }

    
}
