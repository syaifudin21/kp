@extends('admin.admin-template')

@section('content')
<section class="content-header">
  <h1>
    Edit Data User
      </h1>
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-header">
    </div>
    <div class="box-body">
      <form role="form" action="{{route('prodi.update',$prodi->id)}}" method="post">
        @csrf @method('put')
        <div class="box-body">
          <div class="form-group{{ $errors->has('prodi') ? ' has-error' : '' }}">
            <label for="exampleInputAlmatMahasiswa">Nama Prodi</label>
            <input type="text" class="form-control" id="exampleInputAlamatMahasiswa" placeholder="Enter Prodi" name="prodi" value="{{$prodi->prodi}}">
            @if ($errors->has('prodi'))
                <span class="help-block">
                    <strong>{{ $errors->first('prodi') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('ketua_prodi') ? ' has-error' : '' }}">
            <label for="exampleInputAlmatMahasiswa">Nama Ketua prodi</label>
            <input type="text" class="form-control" id="exampleInputAlamatMahasiswa" placeholder="Enter Ketua Prodi" name="ketua_prodi" value="{{$prodi->ketua_prodi}}">
            @if ($errors->has('ketua_prodi'))
                <span class="help-block">
                    <strong>{{ $errors->first('ketua_prodi') }}</strong>
                </span>
            @endif
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
  <!-- /.box -->
</section>
@endsection