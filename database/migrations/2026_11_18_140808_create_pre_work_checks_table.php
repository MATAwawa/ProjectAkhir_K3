<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pre_work_checks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('blok_kerja');
            $table->enum('kondisi_kesehatan', ['Sehat / Fit', 'Kurang Fit / Sakit']);
            $table->boolean('pakai_helm')->default(false);
            $table->boolean('pakai_sepatu')->default(false);
            $table->boolean('pakai_sarung_tangan')->default(false);
            $table->boolean('pakai_rompi')->default(false);
            $table->enum('kondisi_alat', ['Baik / Layak', 'Rusak / Perlu Perbaikan']);
            $table->enum('status_kelayakan', ['Layak Kerja', 'Tidak Layak Kerja']);
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pre_work_checks');
    }
};