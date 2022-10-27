<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GantiPelumas extends Model
{
    use HasFactory;
    protected $table = "ganti_pelumas";
    protected $fillable = ['tanggal','equipment_id','pekerjaan','petugas_id','pelumas_id','catatan','gambar'];

    function petugas()
    {
        return $this->belongsTo('App\Models\Petugas');
    }

    function pelumas()
    {
        return $this->belongsTo('App\Models\Pelumas');
    }

    function equipment()
    {
        return $this->belongsTo('App\Models\Equipment');
    }
}
