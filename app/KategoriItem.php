<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriItem extends Model
{
    
	protected $primaryKey = "id_kategori";
	protected $fillable = ["id_item","nama_kategori","slug"];
	protected $table = "item_kategori";
	public $incrementing = true;
	public $timestamps = false;
	public function ritem(){
		$this->belongsTo(Item::class,'id_kategori','id_kategori');
	}
}
