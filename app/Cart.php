<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    
	protected $primaryKey = null;
	protected $fillable = ["id_user","id_item","jumlah"];
	protected $table = "tb_user_cart";
	public $incrementing = false;
	public $timestamps = false;
	public function ruser(){
		return $this->belongsTo(User::class,'id_user','id_user');
	}
	public function ritem(){
		return $this->belongsTo(Item::class,'id_item','id_item');
	}
}
