@extends('pembimbing.pembimbing-template')

@section('content')
<section class="content-header">
  <h1>
    {{$tempatkp->nama}} - {{$ta->tahun_ajaran}}
  </h1> 
</section>
<!---Main Content-->
<section class ="content">
        @if (session('success'))<div class="alert alert-success alert-dismissible">{!! session('success') !!}  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>@endif
        @if (session('gagal'))<div class="alert alert-danger">{!! session('gagal') !!}</div>@endif
        
    <div class="row">
        <div class="col-sm-4">
            <div class="box">
            <div class="box-header"><b>Detail Kerja Praktek</b></div>
                <table class="table">
                    <tr><td>Nama </td> <td>{{$tempatkp->nama}}</td></tr>
                    <tr><td>Alamat </td> <td>{{$tempatkp->alamat}}</td></tr>
                    <tr><td>Diterima </td> <td>{{$tempatkp->bidang}}</td></tr>
                    <tr><td>Kapasitas </td> <td>{{$tempatkp->kapasitas}}</td></tr>
                    <tr><td>Dosen Pembimbing </td> <td>{{$dosen->dosen->nama}}</td></tr>
                </table>
            </div>

        </div>
        <div class="col-sm-4">
            <div class="box">
            <div class="box-header"><b>Mahasiswa</b></div>
            <table class="table">
                @foreach ($mahasiswas as $mahasiswa)
                <tr>
                    <td>{{$mahasiswa->mahasiswa->nama}}</td>
                </tr>
                @endforeach
            </table>
            </div>

            <div class="box">
                    <div class="box-header"> <b>Pembimbing</b>
                    </div>
                    <table class="table">
                        @foreach ($pembimbings as $pembimbing)
                        <tr>
                            <td>{{$pembimbing->nama}}</td>
                        </tr>
                        @endforeach
                    </table>
                    </div>

        </div>
        
        <div class="col-sm-4">
            

        </div>
            
    </div>
</section>
@endsection