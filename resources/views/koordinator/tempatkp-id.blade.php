@extends('koordinator.koordinator-template')

@section('content')
<section class="content-header">
  <h1>
Lihat Data Tempat KP
  </h1> 
</section>
<!---Main Content-->
<section class ="content">
<!---Default box-->
<div class="box">
  <div class="box-header with-border">
      <div class="form-group">
        <label for="exampleInputNamaMahasiswa">Nama Instansi</label>
       <div>{{$tempatkp->nama}}</div> 
      </div>
      <div class="form-group">
            <label for="exampleInputNamaMahasiswa">ALamat Instansi</label>
           <div>{{$tempatkp->alamat}}</div> 
        </div>
        <div class="form-group">
                <label for="exampleInputNamaMahasiswa">Kapasitas</label>
               <div>{{$tempatkp->kapasitas}}</div> 
            </div>
      <a href="{{route('tempatkp.index')}}" class="btn btn-block btn-infobtn-sm"><i class="fa fa-step-backward"></i> kembali</a> 
</div>
</section>
@endsection