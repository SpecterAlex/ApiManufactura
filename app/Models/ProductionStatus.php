<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        "code",
        "description",
    ];

    // Relation one productionStatus belong to many productionOrders
    public function productionOrders()
    {
        return $this->belongsToMany(ProductionOrder::class);
    }
}
