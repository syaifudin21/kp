<?php

namespace App\Http\Controllers\Mahasiswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\KegiatanKp;
use App\Models\TahunAjaran;
use App\Models\PendaftarTempatKp;

class KegiatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:mahasiswa');
    }
    public function index()
    {
        $ta = TahunAjaran::where('aktif', 'ya')->first();
        $diterima = PendaftarTempatKp::where(['id_mahasiswa'=> Auth::user()->id, 'id_tahun'=> $ta->id,'status'=> 'Diterima'])->first();
        $kegiatans = KegiatanKp::where(['id_tahun'=> $ta->id, 'id_tempat_kp'=> $diterima->id_tempat_kp])->paginate(10);
        if (!empty($kegiatans)) {
            return view('mahasiswa.kegiatan', compact('ta', 'diterima', 'kegiatans'));
        }else{
            return redirect('mahasiswa')->with('gagal', 'Anda Belum Diterima Di Instanasi');
        }
    }
    public function create()
    {
        return view('mahasiswa.mahasiswa-create');
    }
    
    public function store(Request $request)
    {
        $kegiatan = new KegiatanKp();
        $kegiatan->fill($request->all());
        $kegiatan->save();

        return redirect('mahasiswa/kegiatan')->with('success', 'Berhasil Menambah Kegiatan');
    }
    public function edit(KegiatanKp $kegiatan)
    {
        return view('mahasiswa.kegiatan-edit', compact('kegiatan'));
    }
    public function update(Request $request, KegiatanKp $kegiatan)
    {
        $this->validate($request, [
            'kegiatan' => 'required',
        ]);

        $kegiatan->fill($request->all());
        $kegiatan->save();

        return redirect('mahasiswa/kegiatan')->with('success', 'Berhasil Update Kegiatan');
    }
    
    public function destroy(Prodi $kegiatan)
    {
        $kegiatan->delete();
        return back()->with('success', 'Berhasil Menghapus Prodi');
    }
}
