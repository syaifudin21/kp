@extends('admin.admin-template')

@section('content')
<section class="content-header">
	<h1>
		Tambah Data Mahasiwa
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
      <form method="post" action="{{route('mahasiswa.store')}}">
      @csrf
      <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
        <label for="nama">Nama Mahasiswa</label>
        <input type="text" class="form-control" id="nama" placeholder="Nama Mahasiswa" name="nama" value="{{old('nama')}}">
        @if ($errors->has('nama'))
            <span class="help-block">
                <strong>{{ $errors->first('nama') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group{{ $errors->has('nrp') ? ' has-error' : '' }}">
        <label for="nrp">NRP</label>
        <input type="number" min="0" class="form-control" id="nrp" placeholder="NRP" name="nrp" value="{{old('nrp')}}">
        @if ($errors->has('nrp'))
            <span class="help-block">
                <strong>{{ $errors->first('nrp') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('ttl') ? ' has-error' : '' }}">
            <label for="ttl">Tempat Tanggal Lahir</label>
            <input type="text" class="form-control" id="ttl" placeholder="Tempat, Tanggal Lahir" name="ttl" value="{{old('ttl')}}">
            @if ($errors->has('ttl'))
                <span class="help-block">
                    <strong>{{ $errors->first('ttl') }}</strong>
                </span>
            @endif
          </div>

        <div class="form-group{{ $errors->has('agama') ? ' has-error' : '' }}">
            <label for="agama">Agama</label>
            <select name="agama" id=""  class="form-control">
                <option value="" selected disabled>Pilih Agama</option>
                <option>Islam</option>
                <option>Kristen</option>
                <option>Katolik</option>
                <option>Hindu</option>
                <option>Budha</option>
            </select>
            @if ($errors->has('agama'))
                <span class="help-block">
                    <strong>{{ $errors->first('agama') }}</strong>
                </span>
            @endif
          </div>

      <div class="form-group{{ $errors->has('hp') ? ' has-error' : '' }}">
            <label for="hp">No Telp. Mahasiswa</label>
            <input type="number" min="0" class="form-control" id="hp" placeholder="No Telp Mahasiswa" name="hp" value="{{old('hp')}}">
            @if ($errors->has('hp'))
                <span class="help-block">
                    <strong>{{ $errors->first('hp') }}</strong>
                </span>
            @endif
          </div>

    <div class="form-group{{ $errors->has('id_prodi') ? ' has-error' : '' }}">
            <label for="hp">Prodi</label>
            <select name="id_prodi" id="" class="form-control">
                <option value="" disabled selected>Pilih Prodi</option>
                @foreach ($prodis as $prodi)
                    <option value="{{$prodi->id}}">{{$prodi->prodi}}</option>
                @endforeach
            </select>
            @if ($errors->has('id_prodi'))
                <span class="help-block">
                    <strong>{{ $errors->first('id_prodi') }}</strong>
                </span>
            @endif
          </div>
          
    <div class="form-group{{ $errors->has('jk') ? ' has-error' : '' }}">
            <label for="laki">Laki / Perempuan</label><br>
            <input type="radio"  id="laki" name="jk" value="Laki-laki">Laki-laki
            <input type="radio"  id="laki" name="jk" value="Perempuan">Perempuan
            @if ($errors->has('jk'))
                <span class="help-block">
                    <strong>{{ $errors->first('jk') }}</strong>
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
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{old('email')}}">
             @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
    
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
            </div>
    
            <div class="form-group">
                    <label for="password">Confirmasi Password</label>
                    <input id="password-confirm" type="password" class="form-control" placeholder="Konfirmasi Password" name="password_confirmation" required>
            </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
  </div>
</div>
</section>
@endsection