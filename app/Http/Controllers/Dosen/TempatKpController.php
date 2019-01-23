<?php

namespace App\Http\Controllers\Dosen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\TempatKp;

class TempatKpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:dosen');
    }
    public function index()
    {
        $tempatkps = TempatKp::paginate(10);
        return view('dosen.tempatkp', compact('tempatkps'));
    }
    public function create()
    {
        return view('dosen.tempatkp-create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kapasitas' => 'required|string|max:255'
        ]);

        $tempatkp = new TempatKp();
        $tempatkp->fill($request->all());
        $tempatkp['auth'] = 'Dosen';
        $tempatkp['id_user'] = Auth::user('auth:dosen')->id;
        $tempatkp->save();

        return redirect('dosen/tempatkp3')->with('success', 'Berhasil Menambah Tempat KP');
    }
    public function show($id)
    {
        $tempatkp = TempatKp::findOrFail($id);
        return view('dosen.tempatkp-id', compact('tempatkp'));
    }
    public function edit($id)
    {
        $tempatkp = TempatKp::findOrFail($id);
        return view('dosen.tempatkp-edit', compact('tempatkp'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kapasitas' => 'required|string|max:255'
        ]);

        $tempatkp = TempatKp::findOrFail($id);
        $tempatkp->fill($request->all());
        $tempatkp->save();

        return redirect('dosen/tempatkp3')->with('success', 'Berhasil Update Tempat KP');
    }
    
    public function destroy($id)
    {
        $tempatkp = TempatKp::findOrFail($id);
        $tempatkp->delete();
        return back()->with('success', 'Berhasil Menghapus Tempat KP');
    }
}
