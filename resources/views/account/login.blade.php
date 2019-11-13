@extends('account/template')

@section('title','Login Akun')
@section('body_class','login-page')
@section('content')
      <!--================================
            START LOGIN AREA
    =================================-->
    <section class="login_area section--padding2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <form  action="{{url('account/login')}}" method="post">
                        {{csrf_field()}}
                        <div class="cardify login">
                            <div class="login--header">
                                <h3>Selamat Datang Kembali</h3>
                                <p>Silahkan login menggunakan username mu</p>
                            </div>
                            <!-- end .login_header -->
                            <div class="login--form">
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
                                @if(session()->has('warning'))
                                <div class="alert alert-danger" style="padding: 15px;">
                                  <span class="alert_icon lnr lnr-warning"></span>
                                  <strong>Warning!</strong> {{session()->get('warning')}}
                                </div>
                                @endif
                                <div class="form-group">
                                    <label for="user_name">Email</label>
                                    <input id="user_name" name="email" type="text" class="text_field" placeholder="Masukan username-mu..." value="{{old('email')}}">
                                </div>

                                <div class="form-group">
                                    <label for="pass">Password</label>
                                    <input id="pass" type="password" name="password" class="text_field" placeholder="Masukan password-mu...">
                                </div>

                                <div class="form-group">
                                    <div class="custom_checkbox">
                                        <input type="checkbox" name="remember" id="ch2">
                                        <label for="ch2">
                                            <span class="shadow_checkbox"></span>
                                            <span class="label_text">Ingat saya</span>
                                        </label>
                                    </div>
                                </div>

                                <button class="btn btn--md btn--round" type="submit">Login</button>

                                <div class="login_assist">
                                    <p class="recover">Lupa <a href="#">password</a> mu ?</p>
                                    <p class="signup">Belum punya <a href="{{url('account/register')}}">akun</a>?</p>
                                    <hr>
                                    <p><a href="{{url('/')}}">Kembali ke halaman awal</a></p>
                                </div>
                            </div>
                            <!-- end .login--form -->
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
            END LOGIN AREA
    =================================-->
@endsection