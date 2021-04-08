<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "name",
        "rfc",
        "email",
        "phone_number",
        "contact_name",
        "contact_number"
    ];

    // Relation one customer has many addresses
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    // Relation one customer belongs to many orders
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
