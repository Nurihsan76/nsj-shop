<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('merek');
            $table->integer('harga');
            $table->text('descripsi_singkat');
            $table->text('descripsi_lengkap');
            $table->text('foto');
            $table->string('sembunyikan_produk')->default("false");
            $table->string('user_id');
            $table->foreignId('kategori_id')->constrained('kategoris');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
}
