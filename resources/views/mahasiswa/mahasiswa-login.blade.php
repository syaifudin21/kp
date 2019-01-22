@extends('front.front-login')

@section('content')
  <div class="login-logo">
    <b>Login Admin</b>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Sistem Informasi Pendaftran Dan Bimbingan Kerja Praktek </p>
    @if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
    @endif
    <form action="{{route('mahasiswa.login')}}" method="post">
      @csrf
      <div class="form-group has-feedback">
        <input type="email" class="form-control" required placeholder="Email" name="email">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" required placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
      </div>
    </form>
  </div>
@endsection
