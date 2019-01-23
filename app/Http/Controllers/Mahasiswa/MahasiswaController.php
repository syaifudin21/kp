<?php

namespace App\Http\Controllers\Mahasiswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TahunAjaran;
use App\Models\PendaftarTempatKp;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemberitahuan;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:mahasiswa');
    }
    public function index()
    {
        $ta = TahunAjaran::where('status', 'Dibuka')->first();
    	return view('mahasiswa.mahasiswa-dashboard', compact('ta'));
    }
    public function daftarkp($id_tahun, $id_tempat_kp)
    {
        $daftar = new PendaftarTempatKp();
        $daftar['id_tahun'] = $id_tahun;
        $daftar['id_tempat_kp'] = $id_tempat_kp;
        $daftar['id_mahasiswa'] = Auth::user('auth:mahasiswa')->id;
        $daftar->save();

        return back()->with('success', 'Berhasil Mendaftar Tempat KP, silahkan menunggu Persetujuan Koordinator KP');
    }
    public function pemberitahuan()
    {
        $pemberitahuans = Pemberitahuan::where(['auth_penerima'=> 'Mahasiswa', 'id_penerima'=> Auth::user()->id, 'status'=> 'Terkirim'])->get();
        return view('mahasiswa.pemberitahuan', compact('pemberitahuans'));
    }
    public function terbaca($id)
    {
        $pemberitahuan = Pemberitahuan::find($id);
        $pemberitahuan['status'] = 'Terbaca';
        $pemberitahuan->save();
    }
}
