<?php

namespace App\Models;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nama','nrp','hp','alamat','jk','email','id_prodi','ttl','agama','password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function prodi(){
        return $this->belongsTo(Prodi::class, 'id_prodi', 'id');
    }
}
