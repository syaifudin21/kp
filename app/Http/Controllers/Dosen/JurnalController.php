<?php

namespace App\Http\Controllers\Dosen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TahunAjaran;
use App\Models\TempatKp;
use App\Models\PendaftarTempatKp;
use App\Models\Pembimbing;
use App\Models\KegiatanKp;
use App\Models\DosenPembimbing;
use Illuminate\Support\Facades\Auth;
use App\Models\Jurnal;
use App\Models\KomentarJurnal;

class JurnalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:dosen');
    }
    public function index()
    {
        $tas = TahunAjaran::where('aktif', 'ya')->get();
    	return view('dosen.jurnal', compact('tas'));
    }
    public function show($id_tahun, $id_tempat_kp, $id_mahasiswa)
    {
        $ta = TahunAjaran::where('aktif', 'ya')->first();
        $diterima = PendaftarTempatKp::where(['id_mahasiswa'=>$id_mahasiswa, 'id_tahun'=> $ta->id,'status'=> 'Diterima'])->first();
        $dosen = DosenPembimbing::where(['id_tempat_kp'=> $diterima->id_tempat_kp, 'id_tahun'=> $ta->id])->first();
        $jurnals = Jurnal::where(['id_mahasiswa'=> $id_mahasiswa, 'id_tahun'=>$ta->id])->get();
            
        return view('dosen.jurnal-id', compact('dosen', 'ta', 'diterima', 'jurnals'));
    }
    
    public function komentar(Request $request)
    {
        $komentar = new KomentarJurnal();
        $komentar->fill($request->all());
        $komentar['id_user'] = Auth::user()->id;
        $komentar['auth'] = 'Mahasiswa';
        $komentar->save();

        return back()->with('success', 'Berhasil Memasukkan Komentar');
    }
}
