<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cleaning extends Model
{
    use HasFactory;
    protected $table = "cleaning";
    protected $fillable = ['tanggal','equipment','pekerjaan','petugas_id','gambar_sebelum','gambar_sesudah'];
    
    function petugas()
    {
        return $this->belongsTo('App\Models\Petugas');
    }
}
