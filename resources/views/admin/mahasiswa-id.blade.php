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
        <label for="nama">Nama Mahasiswa</label>
       <div>{{$mahasiswa->nama}}</div> 
      </div>
      <div class="form-group">
        <label for="nrp">NRP</label>
       <div>{{$mahasiswa->nrp}}</div> 
      </div>
     <div class="form-group">
        <label for="ttl">TTL</label>
       <div>{{$mahasiswa->ttl}}</div> 
      </div>
      <div class="form-group">
        <label for="hp">No HP</label>
       <div>{{$mahasiswa->hp}}</div> 
      </div>
      <div class="form-group">
        <label for="alamat">Alamat Mahasiswa</label>
       <div>{{$mahasiswa->alamat}}</div> 
      </div>
      <div class="form-group">
        <label for="jk">Jenis Kelamin</label>
       <div>{{$mahasiswa->jk}}</div> 
      </div>
      <div class="form-group">
        <label for="email">Email</label>
       <div>{{$mahasiswa->email}}</div> 
      </div>
      <div class="form-group">
        <label for="agama">Agama</label>
       <div>{{$mahasiswa->agama}}</div> 
      </div>
      <div class="form-group">
        <label for="prodi">Prodi</label>
       <div>{{$mahasiswa->prodi->prodi}}</div> 
      </div>
    
     
      <a href="{{route('mahasiswa.index')}}" class="btn btn-block btn-infobtn-sm"><i class="fa fa-step-backward"></i> kembali</a> 
</div>
</section>
@endsection