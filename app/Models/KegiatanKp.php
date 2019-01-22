<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KegiatanKp extends Model
{
    protected $fillable = [
        'id_pendaftar','kegiatan','status'
    ];
}
