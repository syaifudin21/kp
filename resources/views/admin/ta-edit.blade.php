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
      <form role="form" action="{{route('ta.update',$ta->id)}}" method="post">
        @csrf @method('put')
        <div class="box-body">
          <div class="form-group{{ $errors->has('tahun_ajaran') ? ' has-error' : '' }}">
            <label for="exampleInputAlmatMahasiswa">Tahun Ajaran</label>
            <input type="text" class="form-control" id="exampleInputAlamatMahasiswa" placeholder="Enter Tahun Ajaran" name="tahun_ajaran" value="{{$ta->tahun_ajaran}}">
            @if ($errors->has('tahun_ajaran'))
                <span class="help-block">
                    <strong>{{ $errors->first('tahun_ajaran') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('id_koordinator') ? ' has-error' : '' }}">
                <label for="id_koordinator">Koordinator</label>
                <select name="id_koordinator"  class="form-control" id="id_koordinator" name="id_koordinator">
                    <option value="" require selected>Nama Koordinator</option>
                    @foreach ($koordinators as $koordinator)
                    <option value="{{$koordinator->id}}" {{($ta->koordinator->id == $koordinator->id)? 'selected': ''}}>{{$koordinator->nama}}</option>
                    @endforeach
                </select>
                @if ($errors->has('id_koordinator'))
                <span class="help-block">
                    <strong>{{ $errors->first('id_koordinator') }}</strong>
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