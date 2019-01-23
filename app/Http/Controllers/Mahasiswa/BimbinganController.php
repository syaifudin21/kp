<?php

namespace App\Http\Controllers\Mahasiswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BimbinganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:mahasiswa');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'tahun_ajaran' => 'required|string|max:255',
            'id_koordinator' => 'required|string|max:255',
        ]);

        $bimbingan = new Bimbingan();
        $bimbingan->fill($request->all());
        $bimbingan->save();

        return back()->with('success', 'Berhasil Menambah Komentar Bimbingan');
    }
}
