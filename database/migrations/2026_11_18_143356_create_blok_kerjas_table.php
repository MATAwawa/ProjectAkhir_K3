<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blok_kerjas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_blok')->unique();
            $table->string('afdeling');
            $table->string('luas_hektar')->nullable();
            $table->string('nama_pengawas');
            $table->string('status_blok')->default('Aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blok_kerjas');
    }
};