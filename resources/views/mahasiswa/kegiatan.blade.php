@extends('mahasiswa.mahasiswa-template')

@section('head')
@endsection

@section('content')
<div class="searchAndFilter-block">
    <div class="searchAndFilter">
        
        Lakukan Input Data Kegiatan Pelaksanaan Kegiatan Kerja Praktek 
        <a href="{{route('kegiatan.create')}}" class="btn btn-primary">Tambah</a>
        <table class="table table-bordered">
            <thead>
                <tr style="min-width: 200px">Tanggal</tr>
                <tr  style="min-width: 200px">Kegiatan</tr>
                <tr  style="min-width: 200px">Status</tr>
                <tr  style="min-width: 200px"></tr>
            </thead>
            <tbody>
                @foreach ($kegiatans as $kegiatan)
                <tr>
                    <td style="min-width: 200px">{{$kegiatan->created_at}}</td>
                    <td>{{$kegiatan->kegiatan}}</td>
                    <td>{{$kegiatan->status}}</td>
                    <td>
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
</div>
@endsection

@section('script')
@endsection