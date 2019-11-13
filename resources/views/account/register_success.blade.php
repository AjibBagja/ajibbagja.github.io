@extends('account/template')

@section('title','Daftar Sukses')

@section('content')
	<div class="text-center">
	    <i class="fa fa-thumbs-up text-green" style="font-size: 15rem;"></i><br>
	    <h3 class="text-green"> Daftar Sukses </h3>
	    <p> Harap verifikasian email anda sebelum menggunakan akun anda pada website kami. </p>
	    <a href="{{url('account/login')}}" class="btn btn-block btn-primary">Halaman Login</a>
	</div>
@endsection