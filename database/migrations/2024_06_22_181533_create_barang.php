<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_barang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kategori');
            $table->string('nama_barang');
            $table->string('brand')->nullable();
            $table->string('type_barang')->nullable();
            $table->string('model_barang')->nullable();
            $table->string('harga');
            $table->string('stock');
            $table->string('keterangan')->nullable();
            $table->foreign('id_kategori')->references('id')->on('tb_kategori');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_barang');
    }
};
