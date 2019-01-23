@extends('dosen.dosen-template')

@section('content')
<section class="content-header">
  <h1>
    Kerja Praktek
  </h1> 
</section>
<!---Main Content-->
<section class ="content">
<!---Default box-->

@foreach ($tas as $ta)
<div class="box">
<?php
    $kpdosens = App\Models\DosenPembimbing::where('id_dosen', Auth::user()->id)->get();
?>
    @if (!empty($kpdosens))
    <table class="table">
            <tbody>
                <?php 
                   $n= 1;
               ?>
                @foreach ($kpdosens as $kpdosen)
               <tr>
                   <td>{{$n++}}</td>
                   <td colspan="2"><b>{{$kpdosen->tempatkp->nama}}</b>  <small>{{$kpdosen->tempatkp->alamat}}</small></td>
               </tr>
                    <?php
                        $mahasiswas = App\Models\PendaftarTempatKp::where(['id_tempat_kp'=> $kpdosen->id_tempat_kp, 'status' => 'Diterima', 'id_tahun'=> $ta->id])->get();
                    ?>
                    @foreach ($mahasiswas as $mahasiswa)
                    <tr>
                        <td></td>
                        <td>Mahasiswa</td>
                    <td>{{$mahasiswa->mahasiswa->nama}} <div class="pull-right"><a href="{{url('dosen/jurnal/v/'.$ta->id.'/'.$kpdosen->id_tempat_kp.'/'.$mahasiswa->id_mahasiswa)}}" class="btn btn-primary btn-sm">Detail</a></div></td>
                    </tr>
                    @endforeach
               @endforeach
            </tbody>
        </table>
    @endif
</div>
@endforeach


</section>
@endsection