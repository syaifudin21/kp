<?php

namespace App\Http\Controllers\Mahasiswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Jurnal;
use App\Models\TahunAjaran;
use App\Models\PendaftarTempatKp;
use Illuminate\Support\Facades\Auth;
use App\Models\DosenPembimbing;
use App\Models\KomentarJurnal;

class JurnalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:mahasiswa');
    }
    public function index()
    {
        $ta = TahunAjaran::where('aktif', 'ya')->first();
        $diterima = PendaftarTempatKp::where(['id_mahasiswa'=> Auth::user()->id, 'id_tahun'=> $ta->id,'status'=> 'Diterima'])->first();
        if (!empty($diterima)) {
            $dosen = DosenPembimbing::where(['id_tempat_kp'=> $diterima->id_tempat_kp, 'id_tahun'=> $ta->id])->first();
            $jurnals = Jurnal::where(['id_mahasiswa'=> Auth::user()->id, 'id_tahun'=>$ta->id])->get();
            return view('mahasiswa.jurnal', compact('dosen', 'ta', 'diterima', 'jurnals'));
        }else{
            return redirect('mahasiswa')->with('gagal', 'Anda Belum Diterima Di Instanasi');
        }
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_jurnal' => 'required',
            'jurnal' => 'required',
        ]);

        $jurnal = new Jurnal();
        $jurnal->fill($request->all());
        if ($request->hasFile('jurnal')){
            $filenamewithextension = $request->file('jurnal')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('jurnal')->getClientOriginalExtension();
            $filenametostore = $filename.'_'.uniqid().'.'.$extension;
            $request->file('jurnal')->move('images/jurnal',$filenametostore);
            $jurnal['jurnal'] = $filenametostore;
        }
        $jurnal['id_mahasiswa'] = Auth::user()->id;
        $jurnal->save();

        return redirect('mahasiswa/jurnal')->with('success', 'Berhasil Menambah Jurnal');
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
