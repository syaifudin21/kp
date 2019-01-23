@extends('dosen.dosen-template')

@section('content')
<section class="content-header">
  <h1>
Lihat Data Dosen
  </h1> 
</section>
<!---Main Content-->
<section class ="content">
<!---Default box-->
<div class="box">
  <div class="box-header with-border">
      <div class="form-group">
        <label for="exampleInputNamaMahasiswa">Nama Dosen</label>
       <div>{{$dosen->nama}}</div> 
      </div>
      <div class="form-group">
            <label for="exampleInputNamaMahasiswa">No Telp Dosen</label>
           <div>{{$dosen->hp}}</div> 
          </div>
        <div class="form-group">
            <label for="exampleInputNamaMahasiswa">Email</label>
           <div>{{$dosen->email}}</div> 
          </div>
        <div class="form-group">
            <label for="exampleInputNamaMahasiswa">Alamat</label>
           <div>{{$dosen->alamat}}</div> 
          </div>
          
      <a href="{{route('dosen.index')}}" class="btn btn-block btn-infobtn-sm"><i class="fa fa-step-backward"></i> kembali</a> 
</div>
</section>
@endsection