<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->string('kode_tranksaksi')->unique();
            $table->string('id_peminjam');
            $table->string('id_buku');
            $table->string('tgl_peminjaman');
            $table->string('tgl_pengembalian');
            $table->timestamps();

            $table->primary('kode_peminjam' , 'kode_buku');

            $table->foreign('id_peminjam')->references('id')->on('data_peminjam')->onDelete('cascade');

            $table->foreign('id_buku')->references('id')->on('data_buku')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
};
