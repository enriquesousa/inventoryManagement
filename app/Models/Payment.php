<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Customer;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = [];

    
    // relación del customer_id con id de Customer
    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

}
