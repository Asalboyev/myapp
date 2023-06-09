<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class Apartment extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'xona_soni', 'maydon'];

    public function clents()
    {
        return $this->belongsToMany(Clent::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Car::class);
    }

}
