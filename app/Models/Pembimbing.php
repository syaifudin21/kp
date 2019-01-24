<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pembimbing extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'id_tahun','id_tempat_kp','nama','hp','alamat','password', 'email'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function tempatkp(){
        return $this->belongsTo(TempatKp::class, 'id_tempat_kp', 'id');
    }
    public function tahun(){
        return $this->belongsTo(TahunAjaran::class, 'id_tahun', 'id');
    }
}
