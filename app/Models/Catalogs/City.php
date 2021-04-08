<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "state_id"
    ];

    // Relation one city has many zipcodes
    public function zipcodes()
    {
        return $this->hasMany(Zipcode::class);
    }

    // Relation one state belongs to many cities (inverse)
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
