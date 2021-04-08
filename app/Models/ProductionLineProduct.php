<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionLineProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        "product_id",
        "production_line_id",
    ];

    // Relation one product to many productionLineProducts (inverse)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relation one productionLine to many productionLineProducts (inverse)
    public function productionLine()
    {
        return $this->belongsTo(ProductionLine::class);
    }
}
