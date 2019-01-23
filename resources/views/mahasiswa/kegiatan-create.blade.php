@extends('mahasiswa.mahasiswa-template')

@section('head')
@endsection

@section('content')
<div class="searchAndFilter">
        Lakukan Input Data Kegiatan Pelaksanaan Kegiatan Kerja Praktek 
        <div class="float-right">
            <a href="{{route('kegiatan.create')}}" class="btn btn-primary" style="padding: 8px">Tambah</a>
        </div>
        <hr>
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
                            <a href="{{route('kegiatan.edit', $kegiatan->id)}}" class="btn btn-warning btn-sm">Update</a>
                            <a href="" type="button" 
                            onclick="event.preventDefault();
                            document.getElementById('hapus-form{{$kegiatan->id}}').submit();" class="btn btn-danger btn-sm">Hapus</a>

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