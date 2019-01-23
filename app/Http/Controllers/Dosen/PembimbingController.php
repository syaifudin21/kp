<?php

namespace App\Http\Controllers\Dosen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pembimbing;
use Illuminate\Support\Facades\Hash;

class PembimbingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:dosen');
    }
    public function create($id_tahun, $id_tempat_kp)
    {
        return view('dosen.pembimbing-create', compact('id_tahun', 'id_tempat_kp'));
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pembimbings',
            'password' => 'required|string|min:6|confirmed|alpha_num',
        ]);

        $pembimbing = new Pembimbing();
        $pembimbing->fill($request->all());
        $pembimbing['password'] = Hash::make($request['password']);
        $pembimbing->save();

        return redirect('dosen/kerja-praktek/detail/'.$request->id_tahun.'/'.$request->id_tempat_kp)->with('success', 'Berhasil Menambah Pembimbing');
    }
    public function show(Pembimbing $pembimbing)
    {
        return view('dosen.pembimbing-id', compact('pembimbing'));
    }
    public function edit(Pembimbing $pembimbing)
    {
        return view('dosen.pembimbing-edit', compact('pembimbing'));
    }
    public function update(Request $request, Pembimbing $pembimbing)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed|alpha_num',
        ]);

        $pembimbing->fill($request->all());
        $pembimbing['password'] = Hash::make($request['password']);
        $pembimbing->save();

        return redirect('dosen/kerja-praktek/detail/'.$pembimbing->id_tahun.'/'.$pembimbing->id_tempat_kp)->with('success', 'Berhasil Mengubah Pembimbing');
    }
    
    public function destroy(Pembimbing $pembimbing)
    {
        $pembimbing->delete();
        return back()->with('success', 'Berhasil Menghapus Pembimbing');
    }
}
