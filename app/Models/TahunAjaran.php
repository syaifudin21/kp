<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    protected $fillable = [
        'id','tahun_ajaran','id_koordinator'
    ];

    public function koordinator(){
        return $this->belongsTo(Koordinator::class, 'id_koordinator', 'id');
    }
}
