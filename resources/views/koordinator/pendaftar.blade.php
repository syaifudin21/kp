@extends('koordinator.koordinator-template')

@section('content')
<section class="content-header">
  <h1>
    Pendaftar Tahun Ajaran {{$ta->tahun_ajaran}}
  </h1> 
</section>
<!---Main Content-->
<section class ="content">
<!---Default box-->
<div class="box">
  <div class="box-body">
     <table class="table">
         <thead>
             <tr>
                <th>#</th>
                <th>Tempat Kp</th>
                <th>Pendaftar Pendding</th>
                <th></th>
            </tr>
        </thead>
         <tbody>
             <?php 
                $n= 1;
            ?>
             @foreach ($pendaftars as $pendaftar)
            <tr>
                <td>{{$n++}}</td>
                <td>{{$pendaftar->tempatkp->nama}} <br> <small>{{$pendaftar->tempatkp->alamat}}</small></td>
                <td>
                    <?php
                        $mahasiswas = App\Models\PendaftarTempatKp::where(['id_tempat_kp'=> $pendaftar->id_tempat_kp, 'status' => 'Pengajuan', 'id_tahun'=> $ta->id])->get();
                    ?>
                    <ol>
                    @foreach ($mahasiswas as $mahasiswa)
                        <li>{{$mahasiswa->mahasiswa->nama}}</li>
                    @endforeach
                    </ol>
                </td>
                <td>
                    <a href="{{url('koordinator/pendaftar/detail/'.$pendaftar->id_tahun.'/'.$pendaftar->id_tempat_kp)}}" class="btn btn-primary"> Detail</a>
                </td>
            </tr>
             @endforeach
         </tbody>
     </table>
  </div>
</div>
</section>
@endsection