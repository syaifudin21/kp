@extends('pembimbing.pembimbing-template')

@section('head')
@endsection

@section('content')
<section class="content-header">
    <h1> Laporan kegiatan</h1>	
</section>
    <!---Main Content-->
<section class ="content">
        @if (session('success'))<div class="alert alert-success alert-dismissible">{!! session('success') !!}  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>@endif
        @if (session('gagal'))<div class="alert alert-danger">{!! session('gagal') !!}</div>@endif
        
    <!---Default box-->
    <div class="box">
        <div class="box-body">
    <table class="table table-bordered table-sm">
        <tbody>
            <tr class="text-center">
                <th>Tanggal</th>
                <th>Kegiatan</th>
                <th>Status</th>
                <th>Pembimbing</th>
                <th></th>
            </tr>
            @foreach ($kegiatans as $kegiatan)
            <tr>
                <td>{{$kegiatan->created_at}}</td>
                <td>{{$kegiatan->kegiatan}}</td>
                <td>{{$kegiatan->status}}</td>
                <td>{{(!empty($kegiatan->id_pembimbing))? $kegiatan->pembimbing->nama: ' '}}</td>
                <td class="text-center">
                    @if ($kegiatan->status != 'Verifikasi')
                        <div class="pull-right">
                            <a href="{{route('kegiatan.verifikasi', $kegiatan->id)}}" class="btn btn-warning btn-sm">Verifikasi</a>
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