<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laporan_bahayas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelapor');
            $table->enum('jenis_laporan', ['Potensi Bahaya', 'Insiden', 'Kecelakaan Kerja']);
            $table->string('lokasi_blok');
            $table->enum('jenis_bahaya', ['Alat', 'Lingkungan', 'APD', 'Kendaraan', 'Lainnya']);
            $table->text('deskripsi');
            $table->string('foto')->nullable();
            $table->enum('tingkat_risiko', ['Rendah', 'Sedang', 'Tinggi']);
            $table->enum('status', ['Dilaporkan', 'Ditinjau', 'Sedang Ditangani', 'Selesai'])->default('Dilaporkan');
            $table->text('tindakan_pengawas')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporan_bahayas');
    }
};