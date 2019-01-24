<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TahunAjaran;
use App\Models\PendaftarTempatKp;
use App\Models\Pembimbing;
use DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
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
        
    	return view('admin.admin-dashboard', compact('bidang','total', 'ta'));
    }
    public function pembimbing()
    {
        $pembimbings = Pembimbing::paginate(20);
        return view('admin.pembimbing', compact('pembimbings'));
    }
}
