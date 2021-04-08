<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductionStation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "name",
        "code",
        "production_line_id",
        "capacity_per_hour",
    ];

    // Relation one productionStation belong to many productionOrders
    public function productionOrders()
    {
        return $this->belongsToMany(ProductionOrder::class);
    }

    // Relation one productionStation belongs to productionLine
    public function productionLine()
    {
        return $this->belongsTo(ProductionLine::class);
    }
}
