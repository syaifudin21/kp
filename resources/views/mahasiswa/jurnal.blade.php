@extends('mahasiswa.mahasiswa-template')

@section('content')
<section class="content-header">
  <h1> Bimbingan Jurnal </h1> 
</section>
<!---Main Content-->
<section class ="content">
        @if (session('success'))<div class="alert alert-success alert-dismissible">{!! session('success') !!}  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>@endif
        @if (session('gagal'))<div class="alert alert-danger">{!! session('gagal') !!}</div>@endif
        
    <div class="row">
        <div class="col-sm-4">
            <div class="box">
            <div class="box-header"><b>Detail Tempat Kp</b></div>
                <table class="table">
                    <tr><td>Nama </td> <td>{{$diterima->tempatkp->nama}}</td></tr>
                    <tr><td>Alamat </td> <td>{{$diterima->tempatkp->alamat}}</td></tr>
                    <tr><td>Diterima </td> <td>{{$diterima->tempatkp->bidang}}</td></tr>
                    <tr><td>Kapasitas </td> <td>{{$diterima->tempatkp->kapasitas}}</td></tr>
                    <tr><td>Dosen Pembimbing</td> <td>{{(!empty($dosen->id_dosen))? $dosen->dosen->nama: 'Belum Ditunjuk Koordinator'}}</td></tr>
                </table>
            </div>

        </div>

        <div class="col-sm-8">
            <div class="box">
                    <div class="box-header"><b>Kirim Jurnal</b></div>
                    <div  style="padding: 10px">
                    <form action="{{route('jurnal.store')}}"  enctype="multipart/form-data" method="post"> @csrf 
                    <input type="hidden" name="id_tahun" value="{{$ta->id}}">
                    <div class="form-group row">
                        <label for="nama_jurnal" class="col-sm-2 col-form-label">Nama Jurnal</label>
                        <div class="col-sm-10">
                        <input type="input" name="nama_jurnal" class="form-control" id="nama_jurnal" placeholder="Nama Jurnal / Judul">
                        </div>
                    </div>

                    <div class="form-group row">
                            <label for="nama_jurnal" class="col-sm-2 col-form-label">Lampiran Jurnal</label>
                            <div class="col-sm-10">
                            <input type="file" name="jurnal" class="form-control" id="nama_jurnal" placeholder="Nama Jurnal / Judul">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="nama_jurnal" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 ">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                    </div>
                    </form>
                    </div>
            </div>

            <div class="box">
                    <div class="box-header"><b>Jurnal Terkirim</b></div>
                    <table class="table">
                        @foreach ($jurnals as $jurnal)
                            <tr>
                                <td colspan="2">
                                    {{$jurnal->nama_jurnal}}

                                    <div class="pull-right">
                                        <a href="{{asset('images/jurnal/'.$jurnal->jurnal)}}" class="btn btn-light btn-sm">Download</a>
                                    </div>
                                </td>
                            </tr>
                                <?php
                                    $komentars = App\Models\KomentarJurnal::where('id_jurnal', $jurnal->id)->get();
                                ?>
                                @foreach ($komentars as $komentar)
                                    <tr>
                                        <td></td>
                                        <td>

                                            <b>{{($komentar->auth=='Mahasiswa')? $komentar->mahasiswa->nama: $komentar->dosen->nama}}</b>  
                                            {{$komentar->komentar}}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td>
                                        <form action="{{route('komentar.store')}}" method="post"> @csrf
                                            <input type="hidden" name="id_jurnal" value="{{$jurnal->id}}">
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <input type="text" name="komentar" class="form-control" id="komentar" placeholder="Masukkan Komentar Disini">
                                            </div>
                                            <div class="col-sm-2">
                                                <button type="submit" class="btn btn-primary btn-block">Kirim</button>
                                            </div>
                                        </div>
                                        </form>
                                    </td>
                                </tr>
                        @endforeach
                    </table>
            </div>

        
        </div>
    </div>
<!---Default box-->

</section>
@endsection