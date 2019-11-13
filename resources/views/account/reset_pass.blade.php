@extends('account/template')

@section('title','Reset Password')

@section('content')
    @if(!session()->has('success'))
      <p class="login-box-msg">Silahkan ketik email yang anda daftarkan. </p>
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
      <form action="{{url('account/resetpass')}}" method="post">
        {{csrf_field()}}
        <div class="form-group has-feedback">
          <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}" required="">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-flat">Cari Email</button>
      </form>
      <hr>
        <a href="{{url('account/login')}}" class="btn btn-block btn-primary">Halaman Login</a>
    @else
      <div class="text-center">
        <i class="fa fa-envelope text-success" style="font-size: 15rem;"></i><br>
        <h3 class="text-green"> Sukses </h3>
        <p> Kode untuk mereset password sudah dikirim ke email anda. </p>
        <a href="{{url('account/login')}}" class="btn btn-block btn-primary">Halaman Login</a>
      </div>
    @endif
@endsection