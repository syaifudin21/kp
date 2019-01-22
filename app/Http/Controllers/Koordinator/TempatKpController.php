<?php

namespace App\Http\Controllers\Koordinator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TempatKp;

class TempatKpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:koordinator');
    }
    public function index()
    {
        $tempatkps = TempatKp::paginate(10);
        return view('koordinator.tempatkp', compact('tempatkps'));
    }
    public function create()
    {
        return view('koordinator.tempatkp-create');
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
        $tempatkp->save();

        return redirect('koordinator/tempatkp')->with('success', 'Berhasil Menambah Tempat KP');
    }
    public function show(TempatKp $tempatkp)
    {
        return view('koordinator.tempatkp-id', compact('tempatkp'));
    }
    public function edit(TempatKp $tempatkp)
    {
        return view('koordinator.tempatkp-edit', compact('tempatkp'));
    }
    public function update(Request $request, TempatKp $tempatkp)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kapasitas' => 'required|string|max:255'
        ]);

        $tempatkp->fill($request->all());
        $tempatkp->save();

        return redirect('koordinator/tempatkp')->with('success', 'Berhasil Update Tempat KP');
    }
    
    public function destroy(TempatKp $tempatkp)
    {
        $tempatkp->delete();
        return back()->with('success', 'Berhasil Menghapus Tempat KP');
    }
}
