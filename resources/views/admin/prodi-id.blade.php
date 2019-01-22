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
        <label for="exampleInputNamaMahasiswa">Nama Prodi</label>
       <div>{{$prodi->prodi}}</div> 
      </div>
      <div class="form-group">
            <label for="exampleInputNamaMahasiswa">Ketua Prodi</label>
           <div>{{$prodi->ketua_prodi}}</div> 
          </div>
      <a href="{{route('prodi.index')}}" class="btn btn-block btn-infobtn-sm"><i class="fa fa-step-backward"></i> kembali</a> 
</div>
</section>
@endsection