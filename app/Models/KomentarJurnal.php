<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KomentarJurnal extends Model
{
    protected $fillable = [
        'id_jurnal','id_member','komentar','status'
    ];
}
