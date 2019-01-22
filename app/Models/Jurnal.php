<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    protected $fillable = [
        'id_tahun','id_mahasiswa','nama_jurnal','jurnal'
    ];
}
