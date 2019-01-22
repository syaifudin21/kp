@extends('admin.admin-template')

@section('content')
<section class="content-header">
  <h1>
Lihat Data Prodi
  </h1> 
</section>
<!---Main Content-->
<section class ="content">
<!---Default box-->
<div class="box">
  <div class="box-header with-border">
      <div class="form-group">
        <label for="exampleInputNamaMahasiswa">Tahun Ajaran</label>
       <div>{{$ta->tahun_ajaran}}</div> 
      </div>
      <div class="form-group">
            <label for="exampleInputNamaMahasiswa">Koordinator</label>
           {{-- <div>{{$ta->koordinator->nama}}</div>  --}}
          </div>
      <a href="{{route('ta.index')}}" class="btn btn-block btn-infobtn-sm"><i class="fa fa-step-backward"></i> kembali</a> 
</div>
</section>
@endsection