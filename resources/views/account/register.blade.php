@extends('account/template')

@section('title','Daftar Akun')
@section('body_class','signup-page')
@section('content')

    <!--================================
            START SIGNUP AREA
    =================================-->
    <section class="signup_area section--padding2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <form action="{{url('account/register')}}" method="POST">
                        {{csrf_field()}}
                        <div class="cardify signup_form">
                            @if (count($errors) > 0)
                            <div class="alert alert-danger" style="padding: 15px;">
                              <span class="alert_icon lnr lnr-warning"></span>
                              <strong>Error!</strong><br>
                              @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                              @endforeach
                            </div>
                            @endif
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

                            @if(!session()->has('rsuccess'))
                            <div class="login--header">
                                <h3>Buat Akun Baru</h3>
                                <p>Silahkan isikan data di kolom kolom yang sudah disediakan untuk membuat akunmu
                                </p>
                            </div>

                            <div class="login--form">

                                <div class="form-group">
                                    <label for="urname">Nama Lengkap</label>
                                    <input id="urname" type="text" class="text_field" placeholder="Namamu..." name="nama" value="{{old('nama')}}" required="true">
                                </div>

                                <div class="form-group">
                                    <label for="email_ad">Alamat Email</label>
                                    <input id="email_ad" type="text" class="text_field" placeholder="Emailmu... " name="email" value="{{old('email')}}" required="true">
                                </div>

                                <div class="form-group">
                                    <label for="email_ad">Nomor HP</label>
                                    <input id="email_ad" type="text" class="text_field" placeholder="Nomor HPmu... " name="nomor_hp" value="{{old('nomor_hp')}}" required="true">
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="text_field" placeholder="Password yang diinginkan..." name="password" required="true">
                                </div>

                                <div class="form-group">
                                    <label for="con_pass">Konfirmasi Password</label>
                                    <input id="con_pass" type="password" class="text_field" placeholder="Password sama dengan sebelumnya..." name="password_confirmation" required="true">
                                </div>

                                <button class="btn btn--md btn--round register_btn" type="submit">Daftar sekarang!</button>

                                <div class="login_assist">
                                    <p>Sudah punya akun ?
                                        <a href="{{url('login')}}">Login</a>
                                    </p>
                                    <p>Lupa password ?
                                        <a href="">Reset Password</a>
                                    </p>
                                    <hr>
                                    <p><a href="{{url('/')}}">Kembali ke halaman awal</a></p>
                                </div>
                            </div>
                            @else
                            <div class="login--header">
                                <i class="fa fa-thumbs-up mcolor1" style="font-size: 15rem;"></i><br>
                                <h3 class="mcolor1"> Daftar Sukses </h3>
                                <p> Harap verifikasian email anda sebelum menggunakan akun anda pada website kami. </p><br><br>
                                <a href="{{url('account/login')}}" class="btn btn--md btn--round">Halaman Login</a>
                            </div>
                            @endif
                        </div>
                        <!-- end .cardify -->
                    </form>
                </div>
                <!-- end .col-md-6 -->
            </div>
            <!-- end .row -->
        </div>
        <!-- end .container -->
    </section>
    <!--================================
            END SIGNUP AREA
    =================================-->
@endsection