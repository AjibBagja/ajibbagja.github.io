<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class DetailTransaksi extends Model
{
    
	// protected $primaryKey = null;
	protected $primaryKey = "id_transaksi";
	protected $fillable = ["id_transaksi","id_item","jumlah","harga_awal","withdrawal",'status_withdraw','kd_withdraw','conversation_id'];
	protected $table = "tb_detail_transaksi";
	public $incrementing = false;
	public $timestamps = false;
	protected $dates=['deleted_at'];
	public function ritem(){
		return $this->hasOne(Item::class,'id_item','id_item');
	}
	public function rtrans(){
		return $this->belongsTo(Transaksi::class,"id_transaksi","id_transaksi");
	}
}
