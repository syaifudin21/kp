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
<div class="box-header">{{$ta->tahun_ajaran}}</div>
<?php
    $kpdosens = App\Models\DosenPembimbing::where('id_dosen', Auth::user()->id)->get();
?>
    @if (!empty($kpdosens))
    <table class="table">
            <thead>
                <tr>
                   <th>#</th>
                   <th>Tempat Kp</th>
                   <th>Pendaftar</th>
                   <th></th>
               </tr>
           </thead>
            <tbody>
                <?php 
                   $n= 1;
               ?>
                @foreach ($kpdosens as $kpdosen)
               <tr>
                   <td>{{$n++}}</td>
                   <td><b>{{$kpdosen->tempatkp->nama}}</b> <br> <small>{{$kpdosen->tempatkp->alamat}}</small></td>
                   <td>
                       <?php
                           $mahasiswas = App\Models\PendaftarTempatKp::where(['id_tempat_kp'=> $kpdosen->id_tempat_kp, 'status' => 'Diterima', 'id_tahun'=> $ta->id])->get();
                       ?>
                       <ol>
                       @foreach ($mahasiswas as $mahasiswa)
                           <li>{{$mahasiswa->mahasiswa->nama}}</li>
                       @endforeach
                       </ol>
                   </td>
                   <td>
                       <a href="{{url('dosen/kerja-praktek/detail/'.$ta->id.'/'.$kpdosen->id_tempat_kp)}}" class="btn btn-primary"> Detail</a>
                   </td>
               </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endforeach


</section>
@endsection