@extends('layouts.app')
@section('title', 'Dashboard Pengawas - SIKAP Sawit')
@section('content')
<div class="row">
  <div class="col-md-12 grid-margin">
    <h3 class="font-weight-bold">Dashboard Pengawas Lapangan</h3>
    <h6 class="font-weight-normal mb-0">Pantau kepatuhan Pre-Work Check dan tindak lanjuti laporan bahaya di blok kerja</h6>
  </div>
</div>
<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card card-light-danger">
      <div class="card-body">
        <p class="mb-4">Laporan Risiko Tinggi Belum Selesai</p>
        <p class="fs-30 mb-2">{{ $risikoTinggi }}</p>
        <a href="{{ route('laporan-bahaya.index') }}" class="text-white font-weight-bold">Tinjau Laporan Sekarang &rarr;</a>
      </div>
    </div>
  </div>
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card card-tale">
      <div class="card-body">
        <p class="mb-4">Total Laporan Masuk</p>
        <p class="fs-30 mb-2">{{ $totalLaporan }}</p>
        <p>Status Selesai: {{ $laporanSelesai }} laporan</p>
      </div>
    </div>
  </div>
</div>
@endsection