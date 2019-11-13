@extends('account/template')

@section('title','Reset Password')

@section('content')
    @if(!session()->has('success'))
      <p class="register-box-msg">Silahkan isikan data yang dibutuhkan. </p>
      @if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      @if(session()->has('error'))
      <div class="alert alert-danger">
        {{session()->get('error')}}
      </div>
      @endif
      <form action="{{url('account/resetpass/'.$code)}}" method="post">
        {{csrf_field()}}
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password" required="">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Konfirmasi password" name="password_confirmation" required="">
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-flat">Reset Password</button>  
      </form>
    @else
      <div class="text-center">
        <i class="fa fa-thumbs-up text-success" style="font-size: 15rem;"></i><br>
        <h3 class="text-green"> Sukses </h3>
        <p> Password akun anda sudah direset dan akun anda sudah siap dipakai. </p>
        <a href="{{url('account/login')}}" class="btn btn-block btn-primary">Halaman Login</a>
      </div>
    @endif
@endsection