<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Dosen;

class DosenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $dosens = Dosen::paginate(10);
        return view('admin.dosen', compact('dosens'));
    }
    public function create()
    {
        return view('admin.dosen-create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:dosens',
            'password' => 'required|string|min:6|confirmed|alpha_num',
        ]);

        $dosen = new Dosen();
        $dosen->fill($request->all());
        $dosen['password'] = Hash::make($request['password']);
        $dosen->save();

        return redirect('admin/dosen')->with('success', 'Berhasil Menambah Dosen');
    }
    public function show(Dosen $dosen)
    {
        return view('admin.dosen-id', compact('dosen'));
    }
    public function edit(Dosen $dosen)
    {
        return view('admin.dosen-edit', compact('dosen'));
    }
    public function update(Request $request, Dosen $dosen)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed|alpha_num',
        ]);

        $dosen->fill($request->all());
        $dosen['password'] = Hash::make($request['password']);
        $dosen->save();

        return redirect('admin/dosen')->with('success', 'Berhasil Update Dosen');
    }
    
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return back()->with('success', 'Berhasil Menghapus Dosen');
    }
}