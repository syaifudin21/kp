@extends('admin.admin-template')

@section('content')
<section class="content-header">
	<h1>
		Tambah Data Prodi
	</h1>	
</section>
<!---Main Content-->
<section class ="content">
<!---Default box-->
<div class="box">
	<div class="box-header">
  </div>
  <div class="box-body">
    <div class="box-body">
      <form method="post" action="{{route('prodi.store')}}">
      @csrf
      <div class="form-group{{ $errors->has('prodi') ? ' has-error' : '' }}">
        <label for="exampleInputAlmatMahasiswa">Nama Prodi</label>
        <input type="text" class="form-control" id="exampleInputAlamatMahasiswa" placeholder="Enter Prodi" name="prodi" value="{{old('prodi')}}">
        @if ($errors->has('prodi'))
            <span class="help-block">
                <strong>{{ $errors->first('prodi') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group{{ $errors->has('ketua') ? ' has-error' : '' }}">
        <label for="exampleInputAlmatMahasiswa">Nama Ketua Prodi</label>
        <input type="text" class="form-control" id="exampleInputAlamatMahasiswa" placeholder="Enter Prodi" name="ketua_prodi" value="{{old('prodi')}}">
         @if ($errors->has('ketua_prodi'))
            <span class="help-block">
                <strong>{{ $errors->first('ketua_prodi') }}</strong>
            </span>
        @endif
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
  </div>
</div>
</section>
@endsection