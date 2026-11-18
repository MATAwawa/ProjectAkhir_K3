<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanBahaya extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pelapor',
        'jenis_laporan',
        'lokasi_blok',
        'jenis_bahaya',
        'deskripsi',
        'foto',
        'tingkat_risiko',
        'status',
        'tindakan_pengawas',
    ];
}