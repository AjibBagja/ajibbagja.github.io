<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
use Validator;
use Session;
use Redirect;
use Hash;
use Mail;
use Crypt;
use Arr;

class AccountController extends Controller
{
    public function loginindex(){
    	return view('account/login');
    }
    public function home(){
        return view('seller/template');    
    }
    public function login(Request $request){
        $ref = null;
        if($request->has('url_ref')){
            $ref = $request->get('url_ref');
        }
		$rules = array(
            'email' => 'required|min:4',
            'password' => 'required|min:4'
        );
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect('account/login')->with('ref',$ref)->withErrors($validator)->withInput();
        }
        else{
            $data = Arr::except($request->all(),['_token','url_ref','remember']);
            $remember = ($request->has('remember')) ? true : false ;
            if(Auth::attempt($data,$remember)){
                $obj = (Auth::check()) ? true : false;
                if($obj){
                    if($ref != null){
                        return redirect($ref);
                    }
                    else{
                        return redirect('i');
                    }
                }
                else{
                    $validator->errors()->add('submit','Terjadi kesalahan dalam server!');
                    return redirect('account/login')->withErrors($validator)->withInput();
                }
            }
            else{
                $validator->errors()->add('submit','Email/Password tidak terdaftar dalam server!');
                return redirect('account/login')->withErrors($validator)->withInput();
            }
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/')->with('success','Sampai jumpa lagi!');
    }
    public function registerindex(){
        return view('account/register');
    }
    public function register(Request $request){
        $rules = array(
            'email' => 'required|min:4|max:100|unique:mysql.users,email',
            'nama' => 'required|min:6|max:100',
            'password' => 'required|min:4|max:255|confirmed',
            'nomor_hp' => 'required|min:10|max:20|unique:mysql.users,nomor_hp'
        );
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect('account/register')->withErrors($validator)->withInput();
        }
        else{
            $arr = $request->all();
            $arr['password'] = Hash::make($arr['password']);
            Arr::except($arr,['_token','password_confirmation','aggreement']);
            $arr['activation_code'] = str_random(40);
            $data =User::create($arr);
            if($data){
                Mail::send('account.email_verif', ['data' => $data], function ($m) use ($request) {
                    $m->from('no-reply@adestore.net', 'Ade Store Bot');

                    $m->to($request->get('email'), $request->get('nama'))->subject('Aktivasi Akun');
                });
                return redirect('account/register')->with('rsuccess',$request->get('nama'));
            }
            else{
                $validator->errors()->add('submit','Terjadi kesalahan dalam server!');
                return redirect('account/login')->withErrors($validator)->withInput();
            }
        }
    }
    public function rsuccess(){
        return view('account/register_success');
    }
    public function activateAccount(Request $request,$code){
        $data = User::where('activated',false)->where('activation_code',$code)->first();
        if($data){
            $data->activated = true;
            $data->activation_code = null;
            if($data->save()){
                return redirect('account/login')->with('success','Akun anda berhasil diaktifkan!');
            }
            else{
                return redirect('account/login')->with('error','Terjadi kesalahan pada server!');
            }
        }
        else{
            return redirect('account/login')->with('error','Kode aktivasi tidak valid!');
        }
    }
    public function verifPage(){
        return view('account/resend_verif');
    }
    public function resendVerif(Request $request,$id){
        $id = Crypt::decrypt($id);
        $data = User::find($id);
        if($data){
            $data->activated = false;
            $data->activation_code = str_random(40);
            $data->save();
            Mail::send('account.email_verif', ['user_id' => $data->id], function ($m) use ($data) {
                $m->from('no-reply@adestore.com', 'Ade Store Bot');

                $m->to($data->email, $data->nama)->subject('Aktivasi Akun');
            });
            return redirect('account/verify')->with('success','Kode aktivasi berhasil dikirimkan!')->with('id',Crypt::encrypt($id));
        }
        else{
            return redirect('account/login')->with('error','Akun anda tidak valid!');
        }
    }
    public function resetPassPage(){
        return view('account/reset_pass');
    }
    public function resetPassSearch(Request $request){
        $rules = array(
            'email' => 'required|min:4|max:100'
        );
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect('account/resetpass')->withErrors($validator)->withInput();
        }
        else{
            $data = User::where('email',$request->get('email'))->first();
            if($data){
                $data->reset_pass_code = str_random(40);
                $data->save();
                Mail::send('account.reset_pass_email', ['user_id' => $data->id], function ($m) use ($data) {
                    $m->from('no-reply@adestore.com', 'Ade Store Bot');

                    $m->to($data->email, $data->nama)->subject('Aktivasi Akun');
                });
                return redirect('account/resetpass')->with('success','lalkwdjlakwjd');
            }
            else{
                return redirect('account/resetpass')->with('error','Email tersebut tidak ada!');
            }
        }
    }
    public function resetPassInput(Request $request,$code){
        $data = User::where('reset_pass_code',$code)->first();
        if($data){
            return view('account/reset_pass_input')->with('code',$code);
        }
        else{
            return redirect('account/login')->with('error','Kode reset password tidak valid!');
        }
    }
    public function resetPassValidate(Request $request,$code){
        $rules = array(
            'password' => 'required|min:4|max:255|confirmed'
        );
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        else{
            $data = User::where('reset_pass_code',$code)->first();
            if($data){
                $data->password = Hash::make($request->get('password'));
                $data->reset_pass_code = null;
                $data->save();
                return redirect('account/login')->with('success','Password akun anda sudah direset dan akun sudah siap dipakai');
            }
            else{
                return back()->with('error','Terjadi kesalahan pada server!');
            }
        }
    }
}
