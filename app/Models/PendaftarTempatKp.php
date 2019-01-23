<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendaftarTempatKp extends Model
{
    protected $fillable = [
        'id_tahun','id_tempat_kp','id_mahasiswa','status'
    ];

    public function tahunajaran(){
        return $this->belongsTo(TahunAjaran::class, 'id_tahun', 'id');
    }
    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id');
    }
    public function tempatkp(){
        return $this->belongsTo(TempatKp::class, 'id_tempat_kp', 'id');
    }
    
}
