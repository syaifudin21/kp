<?php

namespace App\Http\Controllers\Koordinator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TempatKp;
use App\Models\PendaftarTempatKp;
use App\Models\TahunAjaran;
use DB;

class KoordinatorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:koordinator');
    }
    public function index()
    {
        $ta = TahunAjaran::where('aktif', 'ya')->first();
        if (!empty($ta)) {
            $pendaftars = PendaftarTempatKp::where(['status'=> 'Diterima', 'pendaftar_tempat_kps.id_tahun'=> $ta->id])
                            ->join('tempat_kps', 'pendaftar_tempat_kps.id_tempat_kp','=', 'tempat_kps.id')
                            ->select('bidang',DB::raw('count(*) as total'))
                            ->groupBy('bidang')
                            ->get();
            $bidang = '';
            $total = '';

            foreach ($pendaftars as $pendaftar) {
            $bidang .= "'".$pendaftar->bidang."', ";
            $total .= $pendaftar->total.', ';
            }
            
            $bidang = substr($bidang, 0, -2);
            $total = substr($total, 0, -2);

            // dd($bidang, $total);
        }else{
            $bidang = 0;
            $total = 0;
        }
        
    	return view('koordinator.koordinator-dashboard', compact('bidang','total', 'ta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
