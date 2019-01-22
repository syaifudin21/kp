<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $mahasiswas = Mahasiswa::paginate(10);
        return view('admin.mahasiswa-create', compact('mahasiswas'));
    }
    public function create()
    {
        return view('admin.mahasiswa-create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:mahasiswas',
            'password' => 'required|string|min:6|confirmed|alpha_num',
        ]);

        $mahasiswa = new Mahasiswa();
        $mahasiswa->fill($request->all());
        $mahasiswa['password'] = Hash::make($request['password']);
        $mahasiswa->save();

        return back()->with('success', 'Berhasil Menambah Mahasiswa');
    }
    public function show(Mahasiswa $mahasiswa)
    {
        return view('admin.mahasiswa-id', compact('mahasiswa'));
    }
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('admin.mahasiswa-edit', compact('mahasiswa'));
    }
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed|alpha_num',
        ]);

        $mahasiswa->fill($request->all());
        $mahasiswa->save();

        return back()->with('success'. 'Berhasil Update Mahasiswa');
    }
    
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return back()->with('success', 'Berhasil Menghapus Mahasiswa');
    }
}
