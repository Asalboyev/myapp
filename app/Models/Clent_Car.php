<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clent_Car extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function cars()
    {
        return $this->belongsTo(Car::class);
    }
}
