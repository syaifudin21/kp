<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendaftarTempatKp extends Model
{
    protected $fillable = [
        'id_tahun','id_dosen','id_tempat_kp','id_mahasiswa','status'
    ];
}
