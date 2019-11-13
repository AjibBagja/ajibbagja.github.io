<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("tb_item",function(Blueprint $table){
            $table->bigIncrements("id_item");
            $table->string("nama_item");
            $table->enum("tipe_item",array_keys(config('config.item_type')));
            $table->integer("harga_item");
            $table->integer("stok_item");
            $table->integer("id_user");
            $table->enum("status_item",array_keys(config('config.item_status')));
            $table->text('description');
            $table->string('slug');
            $table->longtext('detail_item');
            $table->bigInteger('id_kategori');
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
        Schema::drop("tb_item");
    }
}
