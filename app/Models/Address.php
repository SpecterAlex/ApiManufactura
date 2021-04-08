<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "street",
        "number",
        "suburb_id",
        "phone_number",
        "customer_id",
        "invoice"
    ];

    // Relation one address has many orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Relation one suburb belongs to many addresses (inverse)
    public function suburb()
    {
        return $this->belongsTo(Catalogs\Suburb::class);
    }

    // Relation one customer belongs to many addresses (inverse)
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
