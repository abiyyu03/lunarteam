<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;
    protected $table = "petugas";
    protected $fillable = ['nama_petugas'];

    function gantiPelumas()
    {
        return $this->hasMany('App\Models\GantiPelumas');
    }

    function cleaning()
    {
        return $this->hasMany('App\Models\Cleaning');
    }

    function tightening()
    {
        return $this->hasMany('App\Models\Tightening');
    }
}
