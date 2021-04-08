<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductionLine extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "name",
        "code",
    ];

    // Relation one productionLine has many productionStations
    public function productionStations()
    {
        return $this->hasMany(ProductionStation::class);
    }

    // Relation one productionLine belongs to many productionLineProducts
    public function productionLineProducts()
    {
        return $this->belongsToMany(ProductionLineProduct::class);
    }
}
