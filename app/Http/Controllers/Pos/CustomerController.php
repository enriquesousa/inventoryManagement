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

    // EditCustomer
    public function EditCustomer($id){
        $customer = Customer::findOrFail($id);
        return view('backend.customer.edit_customer', compact('customer'));
    }

    // UpdateCustomer
    public function UpdateCustomer(Request $request){

        $customer_id = $request->id;
        $old_image = $request->old_image;

        if($request->file('customer_image')){

            $image = $request->file('customer_image');
            unlink(public_path($old_image)); // para borrar la imagen anterior

            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $image = ImageManager::imagick()->read($image);
            $image->resize(200, 200)->save('upload/customer_images/'.$name_gen);
            $save_url = 'upload/customer_images/'.$name_gen;    

            Customer::findOrFail($customer_id)->update([
                'name' => $request->name,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'address' => $request->address,
                'customer_image' => $save_url,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Cliente con Imagen actualizado con éxito',
                'alert-type' => 'success'
            );
            return redirect()->route('list.customer')->with($notification);

        }else{
            Customer::findOrFail($customer_id)->update([
                'name' => $request->name,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'address' => $request->address,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Cliente actualizado con éxito',
                'alert-type' => 'success'
            );
            return redirect()->route('list.customer')->with($notification);
        }

    }

    // ShowCustomer
    public function ShowCustomer($id){
        $customer = Customer::findOrFail($id);
        return view('backend.customer.show_customer', compact('customer'));
    }

    // DeleteCustomer
    public function DeleteCustomer($id){

        $customer = Customer::findOrFail($id);
        unlink(public_path($customer->customer_image)); // para borrar la imagen anterior

        $customer = Customer::findOrFail($id)->delete();


        $notification = array(
            'message' => 'Cliente eliminado con éxito',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    

    
}
