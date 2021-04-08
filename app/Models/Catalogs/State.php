<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = [
        "name"
    ];

    // Relation one state has many cities
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
