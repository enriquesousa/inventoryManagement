<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Customer;
use App\Models\Invoice;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = [];

    
    // relación del customer_id con id de Customer
    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    // Relación de invoice_id con id de Invoice Model
    public function invoice(){
        return $this->belongsTo(Invoice::class, 'invoice_id', 'id');
    }


}
