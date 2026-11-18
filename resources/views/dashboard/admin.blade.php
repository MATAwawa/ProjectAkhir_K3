@extends('layouts.app')
@section('title', 'Dashboard Admin - SIKAP Sawit')
@section('content')
<div class="row">
  <div class="col-md-12 grid-margin">
    <h3 class="font-weight-bold">Dashboard Administrator K3</h3>
    <h6 class="font-weight-normal mb-0">Kelola data master blok kerja, stok APD, modul edukasi, dan rekapitulasi K3</h6>
  </div>
</div>
<div class="row">
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card card-tale">
      <div class="card-body">
        <p class="mb-4">Total Laporan Bahaya</p>
        <p class="fs-30 mb-2">{{ $totalLaporan }}</p>
        <p>{{ $laporanSelesai }} sudah diselesaikan</p>
      </div>
    </div>
  </div>
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card card-light-danger">
      <div class="card-body">
        <p class="mb-4">Bahaya Risiko Tinggi Aktif</p>
        <p class="fs-30 mb-2">{{ $risikoTinggi }}</p>
        <p>Memerlukan perhatian segera</p>
      </div>
    </div>
  </div>
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card card-dark-blue">
      <div class="card-body">
        <p class="mb-4">Akses Penuh Data Master</p>
        <p class="fs-30 mb-2">Admin</p>
        <p>Pengelolaan APD, Blok & Edukasi K3</p>
      </div>
    </div>
  </div>
</div>
@endsection