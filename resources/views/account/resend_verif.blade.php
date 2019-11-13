@extends('account/template')

@section('title','Verifikasi Email')

@section('content')
    @if(session()->has('success'))
    <div class="alert alert-success" style="padding: 15px;">
      <span class="alert_icon lnr lnr-warning"></span>
      <strong>Sukses!</strong> {{session()->get('success')}}
    </div>
    @endif
    @if(session()->has('error'))
    <div class="alert alert-danger" style="padding: 15px;">
      <span class="alert_icon lnr lnr-warning"></span>
      <strong>Error!</strong> {{session()->get('error')}}
    </div>
    @endif
    <i class="fa fa-exclamation-triangle m-color2" style="font-size: 15rem;"></i><br>
    <Hr>
    <a href="{{url('account/login')}}" class="btn btn-block btn-primary">Halaman Login</a>
    <div class="login--header">
      <i class="fa fa-thumbs-up mcolor2" style="font-size: 15rem;"></i><br>
      <h3 class="mcolor2"> Tinggal Selangkah lagi </h3>
      <p> Tinggal selangkah lagi untuk menggunakan akun anda. Harap verifikasian email anda untuk mengaktifkan akun anda pada website kami. </p><br><br>
      <hr>
      @if(!session()->has('success'))
      <p> Belum mendapatkan kode apapun di email ? 
      <form action="{{url('account/resend/'.session()->get('id'))}}" method="POST">
        {{csrf_field()}}
        <button type="submit" class="btn btn--sm btn-success">Kirim Ulang Kode</button>
      </form>
      @endif
      <a href="{{url('account/login')}}" class="btn btn--md btn--round">Halaman Login</a>
    </div>
@endsection