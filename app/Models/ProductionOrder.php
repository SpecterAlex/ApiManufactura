<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductionOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "order_code",
        "quantity",
        "production_station_id",
        "production_status_id",
    ];

    // Relation one productionOrder belongs to order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relation one productionOrder belongs to productionStation
    public function productionStation()
    {
        return $this->belongsTo(ProductionStation::class);
    }

    // Relation one productionOrder belongs to productionStatus
    public function productionStatus()
    {
        return $this->belongsTo(ProductionStatus::class);
    }

    // Relation one productionOrder has many productionOrderDetails
    public function productionOrderDetails()
    {
        return $this->hasMany(ProductionOrderDetail::class);
    }
}
