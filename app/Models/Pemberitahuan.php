<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemberitahuan extends Model
{
    protected $fillable = [
        'auth_pengirim','id_pengirim','auth_penerima','id_penerima','pesan','warna', 'link','status'
    ];

    public function kirim($auth_pengirim, $id_pengirim, $auth_penerima, $id_penerima, $pesan, $warna = 'primary', $link = null)
    {
        $pemberitahuan = new Pemberitahuan();
        $pemberitahuan['auth_pengirim'] = $auth_pengirim;
        $pemberitahuan['id_pengirim'] = $id_pengirim;
        $pemberitahuan['auth_penerima'] = $auth_penerima;
        $pemberitahuan['id_penerima'] = $id_penerima;
        $pemberitahuan['pesan'] = $pesan;
        $pemberitahuan['warna'] = $warna;
        $pemberitahuan['link'] = $link;
        $pemberitahuan->save();

        if ($pemberitahuan) {
            return 'Berhasil';
        }else{
            return 'Gagal';
        }
    }
}
