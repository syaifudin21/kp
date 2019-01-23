@extends('admin.admin-template')

@section('content')
<section class="content-header">
  <h1>
    Edit Data Kegiatan 
      </h1>
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-header">
    </div>
    <div class="box-body">
      <form role="form" action="{{route('kegiatan.update',$kegiatan->id)}}" method="post">
        @csrf @method('put')
        <div class="box-body">
          <div class="form-group{{ $errors->has('kegiatan') ? ' has-error' : '' }}">
            <label for="exampleInputAlmatMahasiswa">Kegiatan</label>
            <input type="text" class="form-control" id="exampleInputAlamatMahasiswa" placeholder="Enter Prodi" name="kegiatan" value="{{$kegiatan->kegiatan}}">
            @if ($errors->has('kegiatan'))
                <span class="help-block">
                    <strong>{{ $errors->first('kegiatan') }}</strong>
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