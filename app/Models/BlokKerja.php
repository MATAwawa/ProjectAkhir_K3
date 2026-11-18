<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlokKerja extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_blok',
        'afdeling',
        'luas_hektar',
        'nama_pengawas',
        'status_blok',
    ];
}