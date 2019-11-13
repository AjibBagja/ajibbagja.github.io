<?php
	use App\Notif;
	function sendNotifTo($id,$text,$type = "",$url = ""){
		return Notif::create(array("id_user" => $id,"text_notif"=>$text,"tipe_notif"=>$type,"url"=>$url));
	}
	function formatRupiah($angka){
		return "Rp " . number_format($angka,0,',','.');
	}
	function getCurrentRouteGroup() {
	    $routeName = explode('/',Illuminate\Support\Facades\Route::current()->getPrefix());
	   	return $routeName[count($routeName)-1];
	}
?>