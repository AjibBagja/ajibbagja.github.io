<?php
    use App\User;
    $data = User::find($user_id);

?>
<html>
    <body style='font-family: arial;'>
        <div style='width:100%;padding:20px;box-sizing:border-box;background-color: rgb(0,85,255);color:white;font-size:24px;font-weight: bold;text-align: center;'>
            Verifikasi Email
        </div>
        <div style='width:100%;background-color:#EEE;padding:20px 10px 10px 20px;font-size:14px;box-sizing:border-box;'>
            Halo ....,{{$data->nama}}<br>
            Email anda terdaftar pada website kami dan anda meminta untuk mereset password anda. <br>Tekan tombol dibawah untuk mereset password akun anda pada website kami <br>
            <a href="{{url('account/resetpass/'.$data->reset_pass_code)}}" target="_blank" style="background-color:#25d366;border:none;border-radius:5px;color:white;padding:10px 20px 10px 20px;text-align:center;text-decoration:none;cursor:hand;margin: 20px;"> Reset Password! </a>
            <br>
            <small> Jika tombol tidak bisa digunakan, anda bisa menggunakan link berikut untuk mengaktivasi akun anda : 
                <a href="{{url('account/resetpass/'.$data->reset_pass_code)}}">{{url('account/activation/'.$data->reset_pass_code)}}</a><br> Copy dan pastekan ke URL Bar di browser anda. </small>
        </div>
        <div style='width:100%;padding:10px;box-sizing:border-box;background-color: rgb(30,30,30);color:white;font-size:12px;font-weight: bold;text-align:center;'>
            Adestore - &copy;2018
        </div>
    </body>
</html>