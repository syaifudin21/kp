<?php

namespace App\Http\Controllers\Dosen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TahunAjaran;
use App\Models\TempatKp;
use App\Models\PendaftarTempatKp;
use App\Models\Pembimbing;

class KpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:dosen');
    }
    public function index()
    {
        $tas = TahunAjaran::where('aktif', 'ya')->get();
    	return view('dosen.kp', compact('tas'));
    }
    public function show($id_tahun, $id_tempat_kp)
    {
        $ta = TahunAjaran::find($id_tahun);
        $tempatkp = TempatKp::find($id_tempat_kp);
        $mahasiswas = PendaftarTempatKp::where(['status'=> 'Diterima', 'id_tempat_kp'=> $id_tempat_kp, 'id_tahun'=> $id_tahun])->get();
        $pembimbings = Pembimbing::where(['id_tempat_kp'=> $id_tempat_kp, 'id_tahun'=> $id_tahun])->get();

        return view('dosen.kp-id', compact('ta', 'tempatkp', 'mahasiswas', 'pembimbings'));
    }
}
