<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Item extends Model
{
	protected $primaryKey = "id_item";
	protected $fillable = ["nama_item","tipe_item","harga_item","stok_item","id_user","status_item",'description','slug','detail_item','id_kategori'];
	protected $table = "tb_item";
	public $incrementing = true;
	public $timestamps = true;
	protected $dates=['deleted_at'];
	public function ruser(){
		return $this->belongsTo(User::class,'id_user','id_user');
	}
	public function rdettrans(){
		return $this->belongsTo(DetailTransaksi::class,'id_item','id_item');
	}
	public function rkategori(){
		return $this->hasOne(KategoriItem::class);
	}
}
