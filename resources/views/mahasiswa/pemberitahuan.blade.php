@extends('mahasiswa.mahasiswa-template')

@section('head')
<link rel="stylesheet" href="{{url('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css')}}">
@endsection

@section('content')
<div class="searchAndFilter-block">
    <div class="searchAndFilter">
        @if (count($pemberitahuans)==0)
        Tidak Ada Pemberitahuan untuk Anda
        @else
        @foreach ($pemberitahuans as $pemberitahuan)
            <div class="alert alert-{{$pemberitahuan->warna}} alert-dismissible fade show" role="alert">
                <strong>{{$pemberitahuan->auth_pengirim}}</strong> {!!$pemberitahuan->pesan!!}
                <button type="button" onclick="hapuspemberitahuan({{$pemberitahuan->id}})" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        @endforeach
        @endif
    </div>
</div>
@endsection

@section('script')
<script>

function hapuspemberitahuan(id) {
  console.log(id)
  $.get('{{ url('mahasiswa/pemberitahuan/terbaca')}}/'+id);
}

// 
</script>
@endsection