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
        Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_harga');
            $table->date('tanggal');
            $table->string('status');
            $table->timestamps();

            $table->foreign('id_pelanggan')->references('id')->on('tb_pelanggan');
            $table->foreign('id_harga')->references('id')->on('tb_harga');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_transaksi');
    }
};
