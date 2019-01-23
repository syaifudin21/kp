<?php

namespace App\Http\Controllers\Mahasiswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Jurnal;

class JurnalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $jurnals = Jurnal::all();
        return view('mahasiswa.jurnal', compact('jurnals'));
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'jurnal' => 'required|string|max:255',
            'ketua_prodi' => 'required|string|max:255',
        ]);

        $jurnal = new Jurnal();
        $jurnal->fill($request->all());
        $jurnal->save();

        return redirect('mahasiwa/jurnal')->with('success', 'Berhasil Menambah Jurnal');
    }
}
