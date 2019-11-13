<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class Transaksi extends Model
{
	use SoftDeletes;
	protected $primaryKey = "id_transaksi";
	protected $fillable = ["id_user","status_transaksi","kode_transaksi","total_bayar"];
	protected $table = "tb_transaksi";
	public $incrementing = true;
	public $timestamps = true;
	protected $dates = ['deleted_at'];
	protected $softDelete = true;
	public function ruser(){
		return $this->belongsTo(User::class,'id_user','id_user');
	}
	public function rdettrans(){
		return $this->hasMany(DetailTransaksi::class,"id_transaksi","id_transaksi");
	}
}
