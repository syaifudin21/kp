@extends('mahasiswa.mahasiswa-template')

@section('head')
@endsection

@section('content')
<section class="content-header">
    <h1> Laporan kegiatan</h1>	
</section>
    <!---Main Content-->
<section class ="content">
    <!---Default box-->
    <div class="box">
        <div class="box-body">
        Lakukan Input Data Kegiatan Pelaksanaan Kegiatan Kerja Praktek 
        <hr>
        <form method="post" action="{{route('kegiatan.store')}}">
                @csrf
        <input type="hidden" name="id_tahun" value="{{$ta->id}}">
        <input type="hidden" name="id_tempat_kp" value="{{$diterima->id_tempat_kp}}">
            <label class="col-md-2">Kegiatan</label>
            <div class="col-md-8">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Kegiatan" name="kegiatan" value="" required>
                </div>
            </div>
            <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-block">Tambah</button>
            </div>
        </form>
    <table class="table table-bordered table-sm">
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
    </div>
    </section>
@endsection

@section('script')
@endsection