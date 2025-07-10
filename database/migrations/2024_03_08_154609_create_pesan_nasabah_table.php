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
        Schema::create('pesan_nasabah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            //$table->string('foto_sampah');
          
            $table->string('jenis_sampah');
            $table->decimal('berat_sampah', 8, 2);
            $table->date('tanggal_pengumpulan');
            $table->string('lokasi_maps')->nullable(); // Kolom untuk lokasi maps
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesan_nasabah');
    }
};
