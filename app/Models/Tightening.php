<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tightening extends Model
{
    use HasFactory;
    protected $table = "tightening";
    protected $fillable = ['tanggal','equipment','pekerjaan','petugas_id'];
    
    function petugas()
    {
        return $this->belongsTo('App\Models\Petugas');
    }
}
