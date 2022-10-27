<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;
    protected $table = "equipment";
    protected $fillable = ['equipment_code','equipment_description',
    'plant_area_id','sub_assets','frequency','quantity'];
    
    
    function plant_area()
    {
        return $this->belongsTo('App\Models\PlantArea');
    }
    
    function gantiPelumas()
    {
        return $this->hasMany('App\Models\GantiPelumas');
    }
}
