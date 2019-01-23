@extends('mahasiswa.mahasiswa-template')

@section('head')
@endsection

@section('content')
<div class="searchAndFilter">
        Lakukan Input Data Kegiatan Pelaksanaan Kegiatan Kerja Praktek 
        <hr>
        <form method="post" action="{{route('kegiatan.store')}}">
                @csrf
        <input type="hidden" name="id_tahun" value="{{$ta->id}}">
        <input type="hidden" name="id_tempat_kp" value="{{$diterima->id_tempat_kp}}">
        <div class="row">
            <label class="col-md-2">Kegiatan</label>
            <div class="col-md-9">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Kegiatan" name="kegiatan" value="" style="width: 100% ;border: 1px #cabdbd solid;" required>
                </div>
            </div>
            <div class="col-md-1">
                <div class="float-right">
                    <button type="submit" class="btn btn-primary" style="padding: 8px;width: 74px;">Tambah</button>
                </div>
            </div>
        </div>
        </form>
    <table class="table table-bordered">
        <tbody>
            <tr class="text-center">
                <th>Tanggal</th>
                <th>Kegiatan</th>
                <th>Status</th>
                <th></th>
            </tr>
            @foreach ($kegiatans as $kegiatan)
            <tr>
                <td style="min-width: 150px">{{$kegiatan->created_at}}</td>
                <td style="min-width: 150px">{{$kegiatan->kegiatan}}</td>
                <td style="min-width: 150px">{{$kegiatan->status}}</td>
                <td style="min-width: 100px" class="text-center">
                    @if ($kegiatan->status != 'Verifikasi')
                        <div class="pull-right">
                            <a href="{{route('kegiatan.edit', $kegiatan->id)}}" class="btn btn-warning btn-sm"  style="padding: 8px">Update</a>
                            <a href="" type="button" 
                            onclick="event.preventDefault();
                            document.getElementById('hapus-form{{$kegiatan->id}}').submit();" class="btn btn-danger btn-sm" style="padding: 8px">Hapus</a>

                            <form id="hapus-form{{$kegiatan->id}}" action="{{route('kegiatan.destroy',$kegiatan->id)}}" method="POST" style="display: none;"> @csrf @method('delete') </form>
                        </div>
                    @else
                    {{$kegiatan->updated_at}}
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('script')
@endsection