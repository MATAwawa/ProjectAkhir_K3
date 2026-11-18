<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanBahayaController;
use App\Http\Controllers\PreWorkCheckController;
use App\Http\Controllers\PerlengkapanController;
use App\Http\Controllers\EdukasiController;
use App\Http\Controllers\BlokKerjaController;
use App\Models\LaporanBahaya;
use App\Models\PreWorkCheck;
use App\Models\Perlengkapan;
use App\Models\BlokKerja;
use App\Models\User;

Route::get('/', function () {
    return Auth::check() ? redirect('/dashboard') : redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', function () {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $totalLaporan = LaporanBahaya::count();
            $risikoTinggi = LaporanBahaya::where('tingkat_risiko', 'Tinggi')->where('status', '!=', 'Selesai')->count();
            $laporanSelesai = LaporanBahaya::where('status', 'Selesai')->count();
            $totalPekerja = User::where('role', 'pekerja')->count();
            $totalPengawas = User::where('role', 'pengawas')->count();
            $stokMenipis = Perlengkapan::whereColumn('stok', '<=', 'stok_minimum')->count();
            $totalBlok = BlokKerja::count();

            return view('dashboard.admin', compact(
                'totalLaporan', 'risikoTinggi', 'laporanSelesai',
                'totalPekerja', 'totalPengawas', 'stokMenipis', 'totalBlok'
            ));

        } elseif ($user->role === 'pengawas') {
            $totalLaporan = LaporanBahaya::count();
            $laporanMenunggu = LaporanBahaya::whereIn('status', ['Dilaporkan', 'Ditinjau', 'Sedang Ditangani'])->latest()->get();
            $risikoTinggi = LaporanBahaya::where('tingkat_risiko', 'Tinggi')->where('status', '!=', 'Selesai')->count();
            $laporanSelesai = LaporanBahaya::where('status', 'Selesai')->count();
            $totalPekerja = User::where('role', 'pekerja')->count();
            $sudahPreWorkHariIni = PreWorkCheck::whereDate('created_at', today())->distinct('user_id')->count('user_id');
            $stokMenipis = Perlengkapan::whereColumn('stok', '<=', 'stok_minimum')->count();

            return view('dashboard.pengawas', compact(
                'totalLaporan', 'laporanMenunggu', 'risikoTinggi', 'laporanSelesai',
                'totalPekerja', 'sudahPreWorkHariIni', 'stokMenipis'
            ));

        } else {
            $laporanSaya = LaporanBahaya::where('nama_pelapor', $user->name)->latest()->get();
            $totalLaporanSaya = $laporanSaya->count();
            $selesaiSaya = $laporanSaya->where('status', 'Selesai')->count();
            $preWorkHariIni = PreWorkCheck::where('user_id', $user->id)->whereDate('created_at', today())->first();

            return view('dashboard.pekerja', compact(
                'laporanSaya', 'totalLaporanSaya', 'selesaiSaya', 'preWorkHariIni'
            ));
        }
    })->name('dashboard');

    Route::resource('laporan-bahaya', LaporanBahayaController::class);
    Route::resource('pre-work', PreWorkCheckController::class)->only(['index', 'create', 'store']);
    Route::resource('perlengkapan', PerlengkapanController::class)->except(['show']);
    Route::resource('edukasi', EdukasiController::class)->only(['index', 'create', 'store', 'show', 'destroy']);
    Route::resource('blok-kerja', BlokKerjaController::class)->except(['show']);
});