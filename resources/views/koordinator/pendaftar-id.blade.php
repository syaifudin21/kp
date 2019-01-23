@extends('koordinator.koordinator-template')

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
            <div class="box-header"><b>Detail Tempat Kp</b></div>
                <table class="table">
                    <tr><td>Nama </td> <td>{{$tempatkp->nama}}</td></tr>
                    <tr><td>Alamat </td> <td>{{$tempatkp->alamat}}</td></tr>
                    <tr><td>Diterima </td> <td>{{$tempatkp->bidang}}</td></tr>
                    <tr><td>Kapasitas </td> <td>{{$tempatkp->kapasitas}}</td></tr>
                </table>
            </div>

            <div class="box" style="padding: 8px">
                @if (empty($dosenpembimbing))
                    <form action="{{route('dosenpembimbing.store')}}" method="post">
                        @csrf 
                        <input type="hidden" name="id_tempat_kp" value="{{$tempatkp->id}}">
                        <input type="hidden" name="id_tahun" value="{{$ta->id}}">
                        <div class="form-group">
                        <label for="exampleFormControlSelect1">Pilih Dosen</label>
                        <select class="form-control" name="id_dosen" id="exampleFormControlSelect1">
                            <option>Pilih Dosen</option>
                            @foreach ($dosens as $dosen)
                                <option value="{{$dosen->id}}">{{$dosen->nama}}</option>
                            @endforeach
                        </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm btn-block">Tambah Dosen</button>
                    </form>
                @else
                    <form action="{{route('dosenpembimbing.update')}}" method="post">
                        @csrf  @method('put')
                        <input type="hidden" name="id" value="{{$dosenpembimbing->id}}">
                        <input type="hidden" name="id_tempat_kp" value="{{$tempatkp->id}}">
                        <input type="hidden" name="id_tahun" value="{{$ta->id}}">
                        <div class="form-group">
                        <label for="exampleFormControlSelect1">Pilih Dosen</label>
                        <select class="form-control" name="id_dosen" id="exampleFormControlSelect1">
                            <option>Pilih Dosen</option>
                            @foreach ($dosens as $dosen)
                                <option value="{{$dosen->id}}" {{($dosenpembimbing->id_dosen == $dosen->id )? 'selected': ''}}>{{$dosen->nama}}</option>
                            @endforeach
                        </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm btn-block">Update Dosen</button>
                    </form>
                    
                @endif
            </div>
        </div>
        <div class="col-sm-4">
            <div class="box">
            <div class="box-header"><b>Mahasiswa Pengajuan</b></div>
            <table class="table">
                @foreach ($mhspengajuans as $mhspengajuan)
                <tr>
                    <td>{{$mhspengajuan->mahasiswa->nama}}</td>
                    <td>
                        <a href="{{url('koordinator/pendaftar/diterima/'.$mhspengajuan->id)}}" class="btn btn-primary btn-sm">Diterima</a>
                        <a href="{{url('koordinator/pendaftar/ditolak/'.$mhspengajuan->id)}}" class="btn btn-danger btn-sm">Ditolak</a>
                    </td>
                </tr>
                @endforeach
            </table>
            </div>

            <div class="box">
            <div class="box-header"><b>Mahasiswa Diterima</b></div>
            <table class="table">
                @foreach ($mhsditerimas as $mhsditerima)
                <tr>
                    <td>{{$mhsditerima->mahasiswa->nama}}</td>
                </tr>
                @endforeach
            </table>
            </div>

            <div class="box">
            <div class="box-header"><b>Mahasiswa Ditolak</b></div>
            <table class="table">
                @foreach ($mhsditolaks as $mhsditolak)
                <tr>
                    <td>{{$mhsditolak->mahasiswa->nama}}</td>
                </tr>
                @endforeach
            </table>
            </div>
        </div>
        <div class="col-sm-4">
                <div class="box">
                <div class="box-header"> <b>Kegiatan</b></div>
                <table class="table table-bordered table-sm">
                        @foreach ($kegiatans as $kegiatan)
                        <tr>
                            <td>{{$kegiatan->created_at}} <br> {{$kegiatan->kegiatan}} - {{$kegiatan->status}}</td>
                        </tr>
                        @endforeach
                </table>
                </div>
        </div>
    </div>
<!---Default box-->

</section>
@endsection