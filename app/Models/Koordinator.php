<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Koordinator extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nama', 'email', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    // public function tahunajaran(){
    //     return $this->hasMany(TahunAjaran::class, 'id_koordinator', 'id');
    // }
}
