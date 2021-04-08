<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionOrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        "quantity",
        "production_order_id",
    ];

    // Relation one productionOrderDetail belongs to productionOrder
    public function productionOrder()
    {
        return $this->belongsTo(ProductionOrder::class);
    }
}
