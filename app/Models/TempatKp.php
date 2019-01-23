<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempatKp extends Model
{
    protected $fillable = [
        'nama','alamat','kapasitas','bidang', 'auth', 'id_user'
    ];

    public function koordinator(){
        return $this->belongsTo(Koordinator::class, 'id_user', 'id');
    }
    public function admin(){
        return $this->belongsTo(Admin::class, 'id_user', 'id');
    }
    public function dosen(){
        return $this->belongsTo(Dosen::class, 'id_user', 'id');
    }
    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class, 'id_user', 'id');
    }
}
