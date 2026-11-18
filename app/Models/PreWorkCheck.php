<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreWorkCheck extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'blok_kerja',
        'kondisi_kesehatan',
        'pakai_helm',
        'pakai_sepatu',
        'pakai_sarung_tangan',
        'pakai_rompi',
        'kondisi_alat',
        'status_kelayakan',
        'catatan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}