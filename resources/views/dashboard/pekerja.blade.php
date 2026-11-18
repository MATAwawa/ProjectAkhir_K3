@extends('layouts.app')
@section('title', 'Dashboard Pekerja - SIKAP Sawit')
@section('content')
<div class="row">
  <div class="col-md-12 grid-margin">
    <h3 class="font-weight-bold">Halo, {{ Auth::user()->name }}!</h3>
    <h6 class="font-weight-normal mb-0">Area Kerja: <strong>{{ Auth::user()->blok_kerja ?? 'Belum diatur' }}</strong> — Pastikan mengisi Pre-Work Check sebelum bekerja.</h6>
  </div>
</div>
<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card bg-success text-white">
      <div class="card-body">
        <h4 class="text-white">1. Cek Kesiapan Kerja (Pre-Work Check)</h4>
        <p>Lakukan pemeriksaan kesehatan & kelengkapan APD sebelum memulai aktivitas panen/perawatan.</p>
        <button class="btn btn-light btn-sm font-weight-bold" disabled>Segera Hadir</button>
      </div>
    </div>
  </div>
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card bg-warning text-dark">
      <div class="card-body">
        <h4>2. Temukan Bahaya di Lapangan?</h4>
        <p>Segera laporkan potensi bahaya, kerusakan alat, atau insiden di sekitar blok kerja Anda.</p>
        <a href="{{ route('laporan-bahaya.index') }}" class="btn btn-dark btn-sm font-weight-bold">Buat Laporan Bahaya</a>
      </div>
    </div>
  </div>
</div>
@endsection