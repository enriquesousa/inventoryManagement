<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Payment;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded = [];


    // relación del id con invoice_id de Payment
    public function payment(){
        return $this->belongsTo(Payment::class, 'id', 'invoice_id');
    }

    // Relación tiene muchos, 'invoice_id' es de InvoiceDetail y 'id' es de Invoice
    public function invoice_details(){
        return $this->hasMany(InvoiceDetail::class,'invoice_id','id');
    }


}
