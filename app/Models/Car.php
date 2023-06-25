<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Apartment;

class Car extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function apartments()
    {
        return $this->belongsToMany(Apartment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Car::class);
    }
    public function cars()
    {
        return $this->belongsToMany(Car::class);
    }
    public function clents()
    {
        return $this->belongsToMany(Clent::class);
    }
}
