<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DosenPembimbing extends Model
{
    protected $fillable = [
        'id_tempat_kp','id_dosen', 'id_tahun'
    ];
    public function dosen(){
        return $this->belongsTo(Dosen::class, 'id_dosen', 'id');
    }
    public function tahun(){
        return $this->belongsTo(TahunAjaran::class, 'id_tahun', 'id');
    }
    
    public function tempatkp(){
        return $this->belongsTo(TempatKp::class, 'id_tempat_kp', 'id');
    }
    
}
