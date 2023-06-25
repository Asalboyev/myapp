<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clent extends Model
{
    use HasFactory;
    protected $table = 'clents';

    protected $fillable = ['name','tel','email','apartments_id',];

   
    public function apartments()
    {
        return $this->belongsTo(Apartment::class);
    }
    public function cars()
    {
        return $this->belongsToMany(Car::class);
    }
}
