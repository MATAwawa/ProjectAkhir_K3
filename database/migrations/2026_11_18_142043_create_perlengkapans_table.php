<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perlengkapans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_apd');
            $table->string('kategori')->default('APD Wajib');
            $table->integer('stok')->default(0);
            $table->integer('stok_minimum')->default(10);
            $table->string('satuan')->default('Unit');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perlengkapans');
    }
};