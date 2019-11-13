<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create("tb_transaksi",function(Blueprint $table){
            $table->bigIncrements("id_transaksi");
            $table->bigInteger('id_user');
            $table->string('kode_transaksi')->nullable();
            $table->enum('status_transaksi',array_keys(config('config.transaksi_status')));
            $table->integer('total_bayar')->nullable();
            $table->timestamps();
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
        Schema::drop('tb_transaksi');
    }
}
