<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Koordinator;

class KoordinatorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $koordinators = Koordinator::paginate(10);
        return view('admin.koordinator', compact('koordinators'));
    }
    public function create()
    {
        return view('admin.koordinator-create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:koordinators',
            'password' => 'required|string|min:6|confirmed|alpha_num',
        ]);

        $koordinator = new Koordinator();
        $koordinator->fill($request->all());
        $koordinator['password'] = Hash::make($request['password']);
        $koordinator->save();

        return redirect('admin/koordinator')->with('success', 'Berhasil Menambah Koordinator');
    }
    public function show(Koordinator $koordinator)
    {
        return view('admin.koordinator-id', compact('koordinator'));
    }
    public function edit(Koordinator $koordinator)
    {
        return view('admin.koordinator-edit', compact('koordinator'));
    }
    public function update(Request $request, Koordinator $koordinator)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed|alpha_num',
        ]);

        $koordinator->fill($request->all());
        $koordinator['password'] = Hash::make($request['password']);
        $koordinator->save();

        return redirect('admin/koordinator')->with('success', 'Berhasil Update Koordinator');
    }
    
    public function destroy(Koordinator $koordinator)
    {
        $koordinator->delete();
        return back()->with('success', 'Berhasil Menghapus Koordinator');
    }
}
