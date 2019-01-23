<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KomentarJurnal extends Model
{
    protected $fillable = [
        'id_jurnal','komentar','auth','id_user'
    ];
    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class, 'id_user', 'id');
    }
    public function dosen(){
        return $this->belongsTo(Dosen::class, 'id_user', 'id');
    }
}
