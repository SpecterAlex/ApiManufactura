<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "name",
        "description",
        "price",
        "volume",
        "url_image",
    ];

    // Relation one product to many orderProducts
    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    // Relation one product to many productionLineProducts
    public function productionLineProducts()
    {
        return $this->hasMany(ProductionLineProduct::class);
    }
}
