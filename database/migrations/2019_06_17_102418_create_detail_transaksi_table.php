<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create("tb_detail_transaksi",function(Blueprint $table){
            $table->bigIncrements("id_transaksi");
            $table->bigInteger('id_item');
            $table->integer('jumlah');
            $table->integer("harga_awal");
            $table->integer("withdrawal");
            $table->enum('status_withdraw',['sudah','belum','proses']);
            $table->string('kd_withdraw')->nullable();
            $table->bigInteger('conversation_id');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tb_detail_transaksi');
    }
}
