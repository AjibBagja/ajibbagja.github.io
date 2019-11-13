<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notif extends Model
{
    protected $table = "notif";
    protected $fillable = ["id_user",'text_notif','tipe_notif','url','readed'];
    protected $primaryKey = "id_notif";
	public function ruser(){
		return $this->belongsTo(User::class,'id_user','id_user');
	}
}
