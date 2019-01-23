@extends('koordinator.koordinator-template')

@section('content')
<section class="content-header">
	<h1>
		Tambah Data Tempat KP
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
      <form method="post" action="{{route('tempatkp1.store')}}">
      @csrf
      <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
        <label for="nama">Nama Instansi</label>
        <input type="text" class="form-control" id="nama" placeholder="Nama Instansi" name="nama" value="{{old('nama')}}">
        @if ($errors->has('nama'))
            <span class="help-block">
                <strong>{{ $errors->first('nama') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group{{ $errors->has('bidang') ? ' has-error' : '' }}">
          <label for="bidang">Bidang Instansi</label>
          <input type="text" class="form-control" id="bidang" placeholder="Bidang Instansi" name="bidang" value="{{old('bidang')}}">
          @if ($errors->has('bidang'))
              <span class="help-block">
                  <strong>{{ $errors->first('bidang') }}</strong>
              </span>
          @endif
        </div>
      <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
        <label for="alamat">Alamat</label>
        <textarea class="form-control" id="alamat" placeholder="Alamat" name="alamat">{{old('alamat')}}</textarea>
         @if ($errors->has('alamat'))
            <span class="help-block">
                <strong>{{ $errors->first('alamat') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group{{ $errors->has('kapasitas') ? ' has-error' : '' }}">
        <label for="kapasitas">Kapasitas</label>
        <input type="number" min="0" class="form-control" id="kapasitas" placeholder="Kapasitas" name="kapasitas" value="{{old('kapasitas')}}">
        @if ($errors->has('kapasitas'))
            <span class="help-block">
                <strong>{{ $errors->first('kapasitas') }}</strong>
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