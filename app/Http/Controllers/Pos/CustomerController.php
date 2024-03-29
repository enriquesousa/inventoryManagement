<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\Payment;
use App\Models\PaymentDetail;
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

            if($old_image){
                unlink(public_path($old_image)); // Si existe imagen anterior,borrar la imagen.
            }

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
    

    // CreditCustomer
    public function CreditCustomer(){
       $allData = Payment::whereIn('paid_status', ['full_due', 'partial_paid'])->get();
       return view('backend.customer.credit_customer', compact('allData'));
    }

    // CreditCustomerPrintPdf
    public function CreditCustomerPrintPdf(){
        $allData = Payment::whereIn('paid_status', ['full_due', 'partial_paid'])->get();
        return view('backend.pdf.customer_credit_pdf', compact('allData'));
    }


    // EditCustomerInvoice
    public function EditCustomerInvoice($invoice_id){
        $payment = Payment::where('invoice_id', $invoice_id)->first();
        $date = date('Y-m-d');
        return view('backend.customer.edit_customer_invoice', compact('payment', 'date'));
    }

    // UpdateCustomerInvoice
    public function UpdateCustomerInvoice(Request $request, $invoice_id){

        if ($request->paid_amount == null) {
            $notification = array(
                'message' => 'El monto de pago parcial no puede ser nulo',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

        if ($request->new_paid_amount < $request->paid_amount) {

            $notification = array(
                'message' => 'El pago no puede ser mayor al monto deuda',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);

        }else{

            $payment = Payment::where('invoice_id',$invoice_id)->first();
            $payment_details = new PaymentDetail();
            $payment->paid_status = $request->paid_status;

            if ($request->paid_status == 'full_paid') {

                $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->new_paid_amount;
                $payment->due_amount = '0';
                $payment_details->current_paid_amount = $request->new_paid_amount;

            } elseif ($request->paid_status == 'partial_paid') {

                $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->paid_amount;
                $payment->due_amount = Payment::where('invoice_id',$invoice_id)->first()['due_amount']-$request->paid_amount;
                $payment_details->current_paid_amount = $request->paid_amount;

            }

            $payment->save();

            $payment_details->invoice_id = $invoice_id;
            $payment_details->date = date('Y-m-d',strtotime($request->date));
            $payment_details->updated_by = Auth::user()->id;
            $payment_details->save();

            $notification = array(
                'message' => 'Factura actualizada con éxito', 
                'alert-type' => 'success'
            );
            return redirect()->route('credit.customer')->with($notification); 

        }  
       
    }


    // CustomerInvoiceDetailsPdf
    public function CustomerInvoiceDetailsPdf($invoice_id){
        $payment = Payment::where('invoice_id', $invoice_id)->first();
        return view('backend.pdf.invoice_details_pdf', compact('payment'));
    }

    // PaidCustomer
    public function PaidCustomer(){
        $allData = Payment::where('paid_status', '!=', 'full_due')->get();
        return view('backend.customer.paid_customer', compact('allData'));
    }

    // PaidCustomerPrintPdf
    public function PaidCustomerPrintPdf(){
        $allData = Payment::where('paid_status', '!=', 'full_due')->get();
        return view('backend.pdf.customer_paid_pdf', compact('allData'));
    }

    // CustomerWiseReport
    public function CustomerWiseReport(){
       $customers = Customer::all();
       return view('backend.customer.customer_wise_report', compact('customers'));
    }

    // CustomerWiseCreditReport
    public function CustomerWiseCreditReport(Request $request){
        $allData = Payment::where('customer_id', $request->customer_id)->whereIn('paid_status', ['full_due', 'partial_paid'])->get();
        return view('backend.pdf.customer_wise_credit_report', compact('allData'));
    }

    // CustomerWisePaidReport
    public function CustomerWisePaidReport(Request $request){
        $allData = Payment::where('customer_id', $request->customer_id)->where('paid_status', '!=', 'full_due')->get();
        return view('backend.pdf.customer_wise_paid_report', compact('allData'));
    }


    
}
