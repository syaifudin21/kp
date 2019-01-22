@extends('admin.admin-template')

@section('content')
<section class="content-header">
	<h1>
		Tambah Tahun Ajaran
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
      <form method="post" action="{{route('ta.store')}}">
      @csrf
      <div class="form-group{{ $errors->has('tahun_ajaran') ? ' has-error' : '' }}">
        <label for="tahun_ajaran">Tahun Ajaran</label>
        <input type="text" class="form-control" id="tahun_ajaran" placeholder="Enter Tahun Ajaran" name="tahun_ajaran" value="{{old('tahun_ajaran')}}">
        @if ($errors->has('tahun_ajaran'))
            <span class="help-block">
                <strong>{{ $errors->first('tahun_ajaran') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group{{ $errors->has('id_koordinator') ? ' has-error' : '' }}">
        <label for="id_koordinator">Koordinator</label>
        <select name="id_koordinator"  class="form-control" id="id_koordinator" placeholder="Enter Prodi" name="id_koordinator">
            <option value="" require selected>Nama Koordinator</option>
            @foreach ($koordinators as $koordinator)
            <option value="{{$koordinator->id}}">{{$koordinator-nama}}</option>
            @endforeach
        </select>
         @if ($errors->has('id_koordinator'))
            <span class="help-block">
                <strong>{{ $errors->first('id_koordinator') }}</strong>
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