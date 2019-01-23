@extends('mahasiswa.mahasiswa-template')

@section('head')
<link rel="stylesheet" href="{{url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{url('https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')
<section class="content-header">
        <h1>
           Dashboard
        </h1>	
    </section>
    <!---Main Content-->
    <section class ="content">
    <!---Default box-->
    <div class="box">
        <div class="box-body">

            @if (session('success'))<div class="alert alert-default alert-dismissible">{!! session('success') !!}  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>@endif
            @if (session('gagal'))<div class="alert alert-danger">{!! session('gagal') !!}</div>@endif
         
            @foreach ($pemberitahuans as $pemberitahuan)
            <div class="alert alert-{{$pemberitahuan->warna}} alert-dismissible" role="alert">
                <strong>{{$pemberitahuan->auth_pengirim}}</strong> {!!$pemberitahuan->pesan!!}
                <button type="button" onclick="hapuspemberitahuan({{$pemberitahuan->id}})" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        @endforeach

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
            <table id="example" class="table table-bordered" style="width:100%">
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
                    <?php
                        $ditrima = App\Models\PendaftarTempatKp::where('id_tempat_kp', $tempatkp->id)
                                        ->where('id_tahun', $ta->id)
                                        ->where('status', 'Diterima')
                                        ->count();
                    ?>
                    <tr>
                        <td>{{$n++}}</td>
                        <td>{{$tempatkp->nama}}</td>
                        <td>{{$tempatkp->alamat}}</td>
                        <td>{{$tempatkp->bidang}}</td>
                        <td>({{$ditrima}}/{{$tempatkp->kapasitas}})</td>
                        <td>
                            @if (empty($mhsdaftar) && $ditrima < $tempatkp->kapasitas)
                                <a href="{{url('mahasiswa/daftarkp/'.$ta->id.'/'.$tempatkp->id)}}"  onclick="return confirm('Apakah Anda Yakin dengan keputusan Anda ?');" class="btn btn-primary" style="padding: 8px">Daftar</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <table class="table">

                    <?php
                        $mahasisatempats = App\Models\PendaftarTempatKp::where(['id_tahun'=> $ta->id, 'status'=>'Diterima', 'id_tempat_kp'=>$mhsditerima->id_tempat_kp])->get();
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
    </section>
@endsection

@section('script')
<script src="{{url('https://code.jquery.com/jquery-3.3.1.js')}}"></script>
<script src="{{url('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );

function hapuspemberitahuan(id) {
  console.log(id)
  $.get('{{ url('mahasiswa/pemberitahuan/terbaca')}}/'+id);
}
</script>
    
@endsection