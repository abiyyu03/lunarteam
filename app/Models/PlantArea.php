<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantArea extends Model
{
    use HasFactory;
    protected $table = "plant_area";
    protected $fillable = ['plant_area'];

    function equipments()
    {
        return $this->hasMany('App\Models\Equipment');
    }
}
