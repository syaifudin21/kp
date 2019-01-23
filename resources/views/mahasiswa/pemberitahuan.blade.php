@extends('mahasiswa.mahasiswa-template')

@section('head')
<link rel="stylesheet" href="{{url('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css')}}">
@endsection

@section('content')
<section class="content-header">
        <h1>
           Pemberitahuan
        </h1>	
    </section>
    <!---Main Content-->
    <section class ="content">
    <!---Default box-->
    <div class="box">
        <div class="box-body">
        @if (empty($pemberitahuans))
        Tidak Ada Pemberitahuan untuk Anda
        @else
        @foreach ($pemberitahuans as $pemberitahuan)
            <div class="alert alert-{{$pemberitahuan->warna}} alert-dismissible" role="alert">
                <strong>{{$pemberitahuan->auth_pengirim}}</strong> {!!$pemberitahuan->pesan!!}
                <button type="button" onclick="hapuspemberitahuan({{$pemberitahuan->id}})" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        @endforeach
        @endif
    </div>
</div>
    </section>
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