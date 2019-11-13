<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notif;
use Auth;
class SiteController extends Controller
{
    public function redirectNotif($id_notif){
    	if(Auth::check()){
	    	$notif = Notif::find($id_notif);
	    	if($notif){
		    	$notif->readed = true;
		    	$notif->save();
		    	return redirect($notif->url);
	    	}
	    	else{
	    		abort(404);
	    	}
    	}
    	else{
    		abort(404);
    	}
    }
    public function readAllNotif(){
        if(Auth::check()){
            $data = Notif::where('id_user',Auth::user()->id_user)->get();
            foreach($data as $d){
                $d->readed = true;
                $d->save();
            }
            return redirect('notif')->with('success','Semua notifikasi sudah ditandai');
        }
        else{

        }
    }
    public function items(Request $request){
    	return view('buyer/home')->with('request',$request);
    }
    public function index(){
    	if(Auth::check()){
    		return redirect('i');
    	}
    	else{
    		return view('welcome');
    	}
    }
    public function mutasibanknotif(Request $request){
        
    }
}
