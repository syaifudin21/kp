<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $fillable = [
        'id_pengirim','id_penerima','pesan','status'
    ];
    //
}
