@extends('koordinator.koordinator-template')

@section('content')
<section class="content-header">
  <h1>
    Edit Data Tempat KP
      </h1>
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-header">
    </div>
    <div class="box-body">
      <form role="form" action="{{route('tempatkp1.update',$tempatkp->id)}}" method="post">
        @csrf @method('put')
        <div class="box-body">
          <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
            <label for="nama">Nama Instansi</label>
            <input type="text" class="form-control" id="nama" placeholder="Nama Instanasi" name="nama" value="{{$tempatkp->nama}}">
            @if ($errors->has('nama'))
                <span class="help-block">
                    <strong>{{ $errors->first('nama') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('bidang') ? ' has-error' : '' }}">
              <label for="bidang">Nama Instansi</label>
              <input type="text" class="form-control" id="bidang" placeholder="Bidang Instanasi" name="bidang" value="{{$tempatkp->bidang}}">
              @if ($errors->has('bidang'))
                  <span class="help-block">
                      <strong>{{ $errors->first('bidang') }}</strong>
                  </span>
              @endif
            </div>
          <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" placeholder="Alamat" name="alamat">{{$tempatkp->alamat}}</textarea>
            @if ($errors->has('alamat'))
                <span class="help-block">
                    <strong>{{ $errors->first('alamat') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('kapasitas') ? ' has-error' : '' }}">
            <label for="kapasitas">Kpaasitas</label>
            <input type="text" class="form-control" id="kapasitas" placeholder="Kapasitas" name="kapasitas" value="{{$tempatkp->kapasitas}}">
            @if ($errors->has('kapasitas'))
                <span class="help-block">
                    <strong>{{ $errors->first('kapasitas') }}</strong>
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