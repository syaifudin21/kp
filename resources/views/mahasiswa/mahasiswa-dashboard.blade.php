@extends('mahasiswa.mahasiswa-template')

@section('head')
<link rel="stylesheet" href="{{url('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css')}}">
@endsection

@section('content')
<div class="searchAndFilter-block">
    <div class="searchAndFilter">

            @if (session('success'))<div class="alert alert-default alert-dismissible">{!! session('success') !!}  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>@endif
            @if (session('gagal'))<div class="alert alert-danger">{!! session('gagal') !!}</div>@endif
            

        @if (!empty($ta))
        
        <?php
            $tempatkps = App\Models\TempatKp::all();
            $mhsdaftar = App\Models\PendaftarTempatKp::where(['id_tahun'=> $ta->id, 'id_mahasiswa'=> Auth::user('auth:mahasiswa')->id, 'status'=>'Pengajuan'])->first();
            $mhsditerima = App\Models\PendaftarTempatKp::where(['id_tahun'=> $ta->id, 'id_mahasiswa'=> Auth::user('auth:mahasiswa')->id, 'status'=>'Diterima'])->first();
            $n = 1;
        ?>

        @if (empty($mhsditerima))
        <div class="alert alert-danger" role="alert">
        Pendaftaran KP Telah dibuka Silahkan Mendaftar. Anda Hanya Mempunyai 1 Kali permintaan pendaftaran dalam masa pending. Koordinator Pendaftaran akan mengirim pesan persetujuan atau penolakan. Jika terjadi penolakan anda dapat mendaftar lagi.
        </div>
        <hr>
        @endif

        @if (!empty($mhsdaftar))
            <div class="alert alert-primary" role="alert">
                Anda Telah Mendaftar Silahkan menunggu Balasan Konrfirmasi Koordinator <br>
                <b>{{$mhsdaftar->tempatkp->nama}} -  {{$mhsdaftar->tempatkp->alamat}}</b>
            </div>
        @endif

        @if (empty($mhsditerima))
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Tempat KP</td>
                        <td>Alamat KP</td>
                        <td>Bidang</td>
                        <td>Kapasitas</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($tempatkps as $tempatkp)
                    <tr>
                        <td>{{$n++}}</td>
                        <td>{{$tempatkp->nama}}</td>
                        <td>{{$tempatkp->alamat}}</td>
                        <td>{{$tempatkp->bidang}}</td>
                        <td>{{$tempatkp->kapasitas}}</td>
                        <td>
                            @if (empty($mhsdaftar))
                                <a href="{{url('mahasiswa/daftarkp/'.$ta->id.'/'.$tempatkp->id)}}"  onclick="return confirm('Apakah Anda Yakin dengan keputusan Anda ?');" class="btn btn-outline-primary" style="padding: 8px">Daftar</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <table class="table">

                    <?php
                        $mahasisatempats = App\Models\PendaftarTempatKp::where(['id_tahun'=> $ta->id, 'status'=>'Diterima'])->get();
                        $dosenpembimbing = App\Models\DosenPembimbing::where(['id_tempat_kp'=> $mhsditerima->id_tempat_kp, 'id_tahun'=> $ta->id])->first();
                        $pembimbing = App\Models\Pembimbing::where(['id_tempat_kp'=> $mhsditerima->id_tempat_kp, 'id_tahun'=> $ta->id])->first();
                    ?>
                    <tr><td>Nama </td> <td>{{$mhsditerima->tempatkp->nama}}</td></tr>
                    <tr><td>Alamat </td> <td>{{$mhsditerima->tempatkp->alamat}}</td></tr>
                    <tr><td>Diterima </td> <td>{{$mhsditerima->tempatkp->bidang}}</td></tr>
                    <tr><td>Kapasitas </td> <td>{{$mhsditerima->tempatkp->kapasitas}}</td></tr>
                    <tr><td>Dosen </td> <td> {{(!empty($dosenpembimbing))? $dosenpembimbing->dosen->nama: ''}}</td>
                    <tr><td>Pembimbing </td> <td> {{(!empty($pembimbing))? $pembimbing->nama: ''}}</td>
                    </tr>
                    <tr><td>Anggota </td> 
                        <td>
                            <ol>
                                @foreach ($mahasisatempats as $mahasisatempat)
                                    <li>{{$mahasisatempat->mahasiswa->nama}}</li>
                                @endforeach
                            </ol>
                        </td>
                    </tr>
                </table>
            @endif
        @else
        'Pendaftaran KP Dibuka'
        @endif
    </div>
</div>
@endsection

@section('script')
<script src="{{url('https://code.jquery.com/jquery-3.3.1.js')}}"></script>
<script src="{{url('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
    
@endsection