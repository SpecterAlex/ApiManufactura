<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProduct extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "quantity",
        "total_product",
        "order_id",
        "product_id",
    ];

    // Relation one orderProduct belongs to order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relation one orderProduct belongs to product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
