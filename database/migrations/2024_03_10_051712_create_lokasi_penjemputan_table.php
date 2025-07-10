<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('lokasi_penjemputan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('no_reff');
            $table->string('status');
            $table->string('lokasi');
            $table->string('koordinat');
            // $table->decimal('koordinat', 11, 8)->nullable();
            // $table->decimal('latitude', 10, 8)->nullable();
            // $table->decimal('longitude', 11, 8)->nullable();
            $table->decimal('jarak')->nullable(); 
            $table->timestamps();

            // Definisikan relasi dengan tabel users
            $table->foreign('no_reff')->references('no_reff')->on('pesan_nasabah')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lokasi_penjemputan');
    }
};
