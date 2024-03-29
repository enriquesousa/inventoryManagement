<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Purchase;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class PurchaseController extends Controller
{
    // ListPurchase
    public function ListPurchase()
    {
        $allData = Purchase::orderBy('date', 'desc')->orderBy('id', 'desc')->get();
        return view('backend.purchase.list_purchase', compact('allData'));
    }

    // AddPurchase
    public function AddPurchase()
    {

        $suppliers = Supplier::all();
        $categories = Category::all();
        $units = Unit::all();
        $date = date('Y-m-d');

        $compra_numero = Purchase::orderBy('purchase_no', 'desc')->first();
        if ($compra_numero == null) {
            $first_reg = '1';
            $compra_numero = str_pad($first_reg, 4, '0', STR_PAD_LEFT);
            $compra_numero = 'C-'.$compra_numero;
        }else{
            $compra_numero = Purchase::orderBy('purchase_no', 'desc')->first();
            $compra_numero = $compra_numero->purchase_no;
            $int = intval(preg_replace('/[^0-9]+/', '', $compra_numero), 10); // strip out any non-numeric characters
            $compra_numero = $int+1;
            $compra_numero = str_pad($compra_numero, 4, '0', STR_PAD_LEFT);
            $compra_numero = 'C-'.$compra_numero;
        }

        return view('backend.purchase.add_purchase', compact('suppliers', 'categories', 'units', 'date', 'compra_numero'));
    }

    // StorePurchase
    public function StorePurchase(Request $request)
    {

        if ($request->category_id == null) {

            $notification = array(
                'message' => 'Error tiene que agregar al menos un producto.',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);

        }else{

            $count_category = count($request->category_id);
            for ($i = 0; $i < $count_category; $i++) {
                $purchase = new Purchase();
                $purchase->date = date('Y-m-d', strtotime($request->date[$i]));
                $purchase->purchase_no = $request->purchase_no[$i];
                $purchase->supplier_id = $request->supplier_id[$i];
                $purchase->category_id = $request->category_id[$i];

                $purchase->product_id = $request->product_id[$i];
                $purchase->buying_qty = $request->buying_qty[$i];
                $purchase->unit_price = $request->unit_price[$i];
                $purchase->buying_price = $request->buying_price[$i];
                $purchase->description = $request->description[$i];

                $purchase->created_by = Auth::user()->id;
                $purchase->status = '0';
                $purchase->save();
            } // end for loop

        } // end else

        $notification = array(
            'message' => 'Compra Agregada Exitosamente',
            'alert-type' => 'success'
        );

        return redirect()->route('list.purchase')->with($notification);
    }

    // DeletePurchase
    public function DeletePurchase($id){

        Purchase::findOrFail($id)->delete();
       
        $notification = array(
            'message' => 'Compra Eliminada Exitosamente',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    // PendingPurchase
    public function PendingPurchase()
    {
        $allData = Purchase::where('status', '0')->orderBy('date', 'desc')->orderBy('id', 'desc')->get();
        return view('backend.purchase.pending_purchase', compact('allData'));
    }

    // ApprovedPurchase
    public function ApprovedPurchase($id){

        $purchase = Purchase::findOrFail($id);
        $product = Product::where('id', $purchase->product_id)->first();
        $product->quantity = ((float)($product->quantity)) + ((float)($purchase->buying_qty));
        
        if ($product->save()) {
            
            Purchase::findOrFail($id)->update([
                'status' => '1'
            ]);

            $notification = array(
                'message' => 'Compra Aprobada Exitosamente',
                'alert-type' => 'success'
            );

            return redirect()->route('pending.purchase')->with($notification);
        }
       
    }

    // DailyPurchaseReport
    public function DailyPurchaseReport(){
        return view('backend.purchase.daily_purchase_report');
    }

    // DailyPurchasePdf
    public function DailyPurchasePdf(Request $request){
        $start_date = date('Y-m-d',strtotime($request->start_date));
        $end_date = date('Y-m-d',strtotime($request->end_date));
        $allData = Purchase::whereBetween('date',[$start_date,$end_date])->orderBy('date', 'desc')->orderBy('id', 'desc')->where('status', '1')->get();
        return view('backend.pdf.daily_purchase_report_pdf',compact('allData','start_date','end_date'));
    }



}
