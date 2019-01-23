<?php

namespace App\Http\Controllers\Koordinator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PendaftarTempatKp;
use App\Models\TahunAjaran;
use App\Models\TempatKp;
use App\Models\Dosen;
use App\Models\DosenPembimbing;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemberitahuan;
use App\Models\KegiatanKp;

class PendaftarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:koordinator');
    }
    public function index()
    {
        $ta = TahunAjaran::where('status', 'Dibuka')->first();
        $pendaftars = PendaftarTempatKp::groupBy('id_tempat_kp')->get();
        return view('koordinator.pendaftar', compact('pendaftars', 'ta'));
    }
    public function show($id_tahun, $id_tempat_kp)
    {
        $ta = TahunAjaran::find($id_tahun);
        $tempatkp = TempatKp::find($id_tempat_kp);
        $dosens = Dosen::all();

        $dosenpembimbing = DosenPembimbing::where('id_tempat_kp', $id_tempat_kp)->first();

        $mhspengajuans = PendaftarTempatKp::where(['status'=> 'Pengajuan', 'id_tempat_kp'=> $id_tempat_kp, 'id_tahun'=> $id_tahun])->get();
        $mhsditerimas = PendaftarTempatKp::where(['status'=> 'Diterima', 'id_tempat_kp'=> $id_tempat_kp, 'id_tahun'=> $id_tahun])->get();
        $mhsditolaks = PendaftarTempatKp::where(['status'=> 'Ditolak', 'id_tempat_kp'=> $id_tempat_kp, 'id_tahun'=> $id_tahun])->get();
        $kegiatans = KegiatanKp::where(['id_tempat_kp'=> $id_tempat_kp, 'id_tahun'=> $id_tahun])->get();

        return view('koordinator.pendaftar-id', compact('ta','kegiatans','dosenpembimbing', 'tempatkp', 'mhspengajuans', 'mhsditerimas', 'mhsditolaks', 'dosens'));
    }
    public function diterima($id)
    {
        $pendaftar = PendaftarTempatKp::findOrFail($id);
        $pendaftar['status'] = 'Diterima';
        $pendaftar->save();

        $notif = new Pemberitahuan();
        $pesan = 'Selamat Anda Telah Diterima di '.$pendaftar->tempatkp->nama;
        $notif->kirim('Koordinator', Auth::user()->id, 'Mahasiswa', $pendaftar->id_mahasiswa, $pesan, 'primary');

        return back()->with('success', 'Berhasil Menerima Mahasiswa');
    }
    public function ditolak($id)
    {
        $pendaftar = PendaftarTempatKp::findOrFail($id);
        $pendaftar['status'] = 'Ditolak';
        $pendaftar->save();

        $notif = new Pemberitahuan();
        $pesan = 'Dengan Berta Hati Kami memberitahukan Penolakan di '.$pendaftar->tempatkp->nama.' Silahkan lakukan daftar lagi pada Tempat KP lain';
        $notif->kirim('Koordinator', Auth::user()->id, 'Mahasiswa', $pendaftar->id_mahasiswa, $pesan, 'danger');

        return back()->with('success', 'Berhasil Menolak Mahasiswa');
    }
    public function storedosen(Request $request)
    {
        $dosen = new DosenPembimbing();
        $dosen['id_dosen'] = $request->id_dosen;
        $dosen['id_tahun'] = $request->id_tahun;
        $dosen['id_tempat_kp'] = $request->id_tempat_kp;
        $dosen->save();

        return back()->with('success', 'Berhasil Menambahkan Dosen Pembimbing');
    }
    public function updatedosen(Request $request)
    {
        $dosen = DosenPembimbing::find($request->id);
        $dosen['id_dosen'] = $request->id_dosen;
        $dosen['id_tahun'] = $request->id_tahun;
        $dosen['id_tempat_kp'] = $request->id_tempat_kp;
        $dosen->save();

        return back()->with('success', 'Berhasil Mengubah Dosen Pembimbing');
    }
}
