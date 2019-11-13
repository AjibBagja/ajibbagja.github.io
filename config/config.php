<?php
/* This is contain website configuration for development purposes */
return [
	/* You can edit this as long as you need */
	"app_title" => "Adestore",
	"withdraw_value"=>80,
	"owner_email"=>"adesunendar05@gmail.com",
	"owner_name"=>"Ade Sunendar",

	/******************* Do not edit these! **************/
	/** 
		These is setting for application, if you edit one of these, the application will crash
	**/
	/* Selection Key & Value */
	// Array Key Item
	"item_type" => [
		"jasa" => "Jasa","barang" => "Barang","akun" => "Akun"
	],
	"kategori_item" => ['Google Developer','VPS','Steam','AWS Amazon']
	,
	// Array Key Status Item
	"item_status" => ['terjual' => "Barang Terjual",'proses' => "Barang diproses",'transaksi' => "Sedang Transaksi",'habis' => "Stok Habis",'ready' => "Stok Tersedia",'hold' => "Barang Ditahan"],

	/* Database table structure */

	// Items
	"tb_item_schema" => ['id_item' => "ID Item","nama_item" => "Nama Item","tipe_item" => "Tipe Item","harga_item" => "Harga Item","stok_item" => "Stok Item","id_user" => "ID User","status_item" => "Status Item","created_at" => "Dibuat Pada","updated_at" => "Terakhir Diperbarui",
	// "tb_item_schema" => ['id_item' => "ID Item","nama_item" => "Nama Item","tipe_item" => "Tipe Item","harga_item" => "Harga Item","stok_item" => "Stok Item","id_user" => "ID User","status_item" => "Status Item","created_at" => "Dibuat Pada","updated_at" => "Terakhir Diperbarui",'slug'=>'Slug','detail_item' =>"Detail Item",'description'=>'Deskripsi Item',
	],

	// Array Key Transaksi
	"transaksi_status" => ['selesai' => "Transaksi Selesai Diproses",'kirim' => "Item/Barang sedang di kirim",'proses' => "Transaksi Sedang Diproses",'chat1' => "Menunggu Diskusi Dengan Penjual",'chat2' => "Menunggu Diskusi Dengan Pembeli",'reply' => "Menunggu Respon Penjual",'batal' => "Dibatalkan","withdrawal" => "Sedang Melakukan Permintaan Penarikan Tunai","withdrawed" => "Sudah Melakukan Penarikan Tunai"],
];