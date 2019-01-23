<?php

namespace App\Http\Controllers\Pembimbing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\TahunAjaran;
use App\Models\TempatKp;
use App\Models\PendaftarTempatKp;
use App\Models\Pembimbing;
use App\Models\KegiatanKp;
use App\Models\DosenPembimbing;

class PembimbingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:pembimbing');
    }
    public function index()
    {
        $ta = TahunAjaran::find(Auth::user()->id_tahun);
        $tempatkp = TempatKp::find(Auth::user()->id_tempat_kp);
        $mahasiswas = PendaftarTempatKp::where(['status'=> 'Diterima', 'id_tempat_kp'=> Auth::user()->id_tempat_kp, 'id_tahun'=>Auth::user()->id_tahun])->get();
        $pembimbings = Pembimbing::where(['id_tempat_kp'=> Auth::user()->id_tempat_kp, 'id_tahun'=> Auth::user()->id_tahun])->get();

        $dosen = DosenPembimbing::where('id_tempat_kp', Auth::user()->id_tempat_kp)->first();

    	return view('pembimbing.pembimbing-dashboard', compact('ta', 'dosen', 'tempatkp', 'mahasiswas', 'pembimbings'));
    }
    public function kegiatan()
    {
        $ta = TahunAjaran::where('aktif', 'ya')->first();
        $kegiatans = KegiatanKp::where(['id_tahun'=> $ta->id, 'id_tempat_kp'=>  Auth::user()->id_tempat_kp])->paginate(10);
        if (!empty($kegiatans)) {
            return view('pembimbing.kegiatan', compact('ta', 'kegiatans'));
        }else{
            return redirect('pembimbing')->with('gagal', 'Anda Belum Diterima Di Instanasi');
        }
    }
    public function verifikasi($id)
    {
        $kegiatan = KegiatanKp::find($id);
        $kegiatan['status'] = 'Verifikasi';
        $kegiatan['id_pembimbing'] = Auth::user()->id;
        $kegiatan->save();
        return back()->with('success', 'Berhasil Verifikasi Kegiatan Mahasiswa');
    }

}
