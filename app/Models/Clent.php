<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clent extends Model
{
    use HasFactory;
    protected $fillable = ['name','tel','email','cars_id','apartments_id',];

    public function cars()
    {
        return $this->belongsTo(Car::class);
    }
    public function apartments()
    {
        return $this->belongsTo(Apartment::class);
    }
}
