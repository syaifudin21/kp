<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Prodi;

class ProdiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $prodis = Prodi::paginate(10);
        return view('admin.prodi', compact('prodis'));
    }
    public function create()
    {
        return view('admin.prodi-create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'prodi' => 'required|string|max:255',
            'ketua_prodi' => 'required|string|max:255',
        ]);

        $prodi = new Prodi();
        $prodi->fill($request->all());
        $prodi->save();

        return redirect('admin/prodi')->with('success', 'Berhasil Menambah Prodi');
    }
    public function show(Prodi $prodi)
    {
        return view('admin.prodi-id', compact('prodi'));
    }
    public function edit(Prodi $prodi)
    {
        return view('admin.prodi-edit', compact('prodi'));
    }
    public function update(Request $request, Prodi $prodi)
    {
        $this->validate($request, [
            'prodi' => 'required|string|max:255',
            'ketua_prodi' => 'required|string|max:255'
        ]);

        $prodi->fill($request->all());
        $prodi->save();

        return redirect('admin/prodi')->with('success', 'Berhasil Update Prodi');
    }
    
    public function destroy(Prodi $prodi)
    {
        $prodi->delete();
        return back()->with('success', 'Berhasil Menghapus Prodi');
    }
}
