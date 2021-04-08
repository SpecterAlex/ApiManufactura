<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zipcode extends Model
{
    use HasFactory;

    protected $fillable = [
        "zipcode",
        "city_id"
    ];

    // Relation one zipcode has many suburbs
    public function suburbs()
    {
        return $this->hasMany(Suburb::class);
    }

    // Relation one city belongs to many zipcodes (inverse)
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
