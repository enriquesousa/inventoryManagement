<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Supplier;
use App\Models\Category;
use App\Models\Unit;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Relación con id del Proveedor
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    // Relación con id de la Categoría
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // Relación con id de la Unidad
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

}
