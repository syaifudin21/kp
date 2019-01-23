@extends('admin.admin-template')

@section('content')
<section class="content-header">
  <h1>
    Edit Data User Pembimbing
      </h1>
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-header">
    </div>
    <div class="box-body">
      <form role="form" action="{{route('pembimbing.update',$pembimbing->id)}}" method="post">
        @csrf @method('put')
        <div class="box-body">
          <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
        <label for="nama">Nama Pembimbing</label>
        <input type="text" class="form-control" id="nama" placeholder="Nama Pembimbing" name="nama" value="{{$pembimbing->nama}}">
        @if ($errors->has('nama'))
            <span class="help-block">
                <strong>{{ $errors->first('nama') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group{{ $errors->has('hp') ? ' has-error' : '' }}">
            <label for="hp">No Telp. Pembimbing</label>
            <input type="number" class="form-control" id="hp" placeholder="No Telp Pembimbing" name="hp" value="{{$pembimbing->hp}}">
            @if ($errors->has('hp'))
                <span class="help-block">
                    <strong>{{ $errors->first('hp') }}</strong>
                </span>
            @endif
          </div>
      <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
        <label for="alamat">Alamat</label>
        <textarea class="form-control" id="alamat" placeholder="Alamat" name="alamat">{{$pembimbing->alamat}}</textarea>
            @if ($errors->has('alamat'))
            <span class="help-block">
                <strong>{{ $errors->first('alamat') }}</strong>
            </span>
        @endif
        </div>
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{$pembimbing->email}}">
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