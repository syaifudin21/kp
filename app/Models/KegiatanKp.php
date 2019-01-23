<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KegiatanKp extends Model
{
    protected $fillable = [
        'id_tahun','id_tempat_kp','kegiatan','status', 'id_pembimbing'
    ];

    public function pembimbing(){
        return $this->belongsTo(Pembimbing::class, 'id_pembimbing', 'id');
    }
}
