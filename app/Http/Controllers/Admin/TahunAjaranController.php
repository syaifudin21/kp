<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TahunAjaran;
use App\Models\Koordinator;

class TahunAjaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $tas = TahunAjaran::paginate(10);
        return view('admin.ta', compact('tas'));
    }
    public function create()
    {
        $koordinators = Koordinator::all();
        return view('admin.ta-create', compact('koordinators'));
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'tahun_ajaran' => 'required|string|max:255',
            'id_koordinator' => 'required|string|max:255',
        ]);

        $ta = new TahunAjaran();
        $ta->fill($request->all());
        $ta->save();

        return redirect('admin/ta')->with('success', 'Berhasil Menambah Tahun Ajaran');
    }
    public function show(TahunAjaran $ta)
    {
        dd($ta);
        return view('admin.ta-id', compact('ta'));
    }
    public function edit(TahunAjaran $ta)
    {
        $koordinators = Koordinator::all();
        dd($ta);
        return view('admin.ta-edit', compact('ta', 'koordinators'));
    }
    public function update(Request $request, TahunAjaran $ta)
    {
        $this->validate($request, [
            'tahun_ajaran' => 'required|string|max:255',
            'id_koordinator' => 'required|string|max:255'
        ]);

        $ta->fill($request->all());
        $ta->save();

        return redirect('admin/ta')->with('success', 'Berhasil Update Tahun Ajaran');
    }
    
    public function destroy(TahunAjaran $ta)
    {
        $ta->delete();
        return back()->with('success', 'Berhasil Menghapus Tahun Ajaran');
    }
}
