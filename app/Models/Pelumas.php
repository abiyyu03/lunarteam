<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelumas extends Model
{
    use HasFactory;
    protected $table = "pelumas";
    protected $fillable = ['nama_pelumas'];
    
    function gantiPelumas()
    {
        return $this->hasMany('App\Models\GantiPelumas');
    }
}
