<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "order",
        "comments",
        "total_order",
        "user_id",
        "shipping_id",
        "production_order_id",
        "customer_id"
    ];

    // Relation one order belongs to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation one order belongs to customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Relation one order belongs to address
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    // Relation one order to many orderProducts
    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    // Relation one order belongs to productionOrder
    public function productionOrder()
    {
        return $this->belongsTo(ProductionOrder::class);
    }
}
