<?php

namespace App\Models\Catalogs;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suburb extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "zipcode_id"
    ];

    // Relation one suburb has many addresses
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    // Relation one zipcode belongs to many suburbs (inverse)
    public function zipcode()
    {
        return $this->belongsTo(Zipcode::class);
    }
}
