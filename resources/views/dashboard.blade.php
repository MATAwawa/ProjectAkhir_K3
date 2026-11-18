@extends('layouts.app')

@section('title', 'Dashboard SIKAP Sawit')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="row">
      <div class="col-12 col-xl-8 mb-4 mb-xl-0">
        <h3 class="font-weight-bold">Selamat Datang di SIKAP Sawit</h3>
        <h6 class="font-weight-normal mb-0">Sistem Informasi Keselamatan dan Kesehatan Kerja (K3) Perkebunan Kelapa Sawit</h6>
      </div>
    </div>
  </div>
</div>

<!-- 4 KARTU RINGKASAN DATA K3 (Bab 3.5) -->
<div class="row">
  <div class="col-md-3 grid-margin stretch-card">
    <div class="card card-tale">
      <div class="card-body">
        <p class="mb-4">Kepatuhan Pre-Work Check</p>
        <p class="fs-30 mb-2">85%</p>
        <p>Pekerja siap shift hari ini</p>
      </div>
    </div>
  </div>
  <div class="col-md-3 grid-margin stretch-card">
    <div class="card card-dark-blue">
      <div class="card-body">
        <p class="mb-4">Laporan Bahaya Bulan Ini</p>
        <p class="fs-30 mb-2">12</p>
        <p>8 Selesai, 4 Ditinjau</p>
      </div>
    </div>
  </div>
  <div class="col-md-3 grid-margin stretch-card">
    <div class="card card-light-danger">
      <div class="card-body">
        <p class="mb-4">Laporan Risiko Tinggi</p>
        <p class="fs-30 mb-2">2</p>
        <p>Perlu penanganan segera</p>
      </div>
    </div>
  </div>
  <div class="col-md-3 grid-margin stretch-card">
    <div class="card card-light-blue">
      <div class="card-body">
        <p class="mb-4">Peringatan Stok APD</p>
        <p class="fs-30 mb-2">2 Item</p>
        <p>Di bawah batas minimum</p>
      </div>
    </div>
  </div>
</div>

<!-- TABEL PEMANTAUAN STOK PERLENGKAPAN (Tabel 3.1 Proposal) -->
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <p class="card-title mb-3">Pemantauan Stok Perlengkapan K3 (APD)</p>
        <div class="table-responsive">
          <table class="table table-striped table-borderless">
            <thead>
              <tr>
                <th>Perlengkapan</th>
                <th>Stok Saat Ini</th>
                <th>Batas Minimum</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Helm Safety</td>
                <td class="font-weight-bold">45</td>
                <td>30</td>
                <td><div class="badge badge-success">Aman</div></td>
              </tr>
              <tr>
                <td>Sarung Tangan</td>
                <td class="font-weight-bold">18</td>
                <td>30</td>
                <td><div class="badge badge-warning">Menipis</div></td>
              </tr>
              <tr>
                <td>Sepatu Safety</td>
                <td class="font-weight-bold">25</td>
                <td>20</td>
                <td><div class="badge badge-success">Aman</div></td>
              </tr>
              <tr>
                <td>Rompi Safety</td>
                <td class="font-weight-bold">12</td>
                <td>20</td>
                <td><div class="badge badge-warning">Menipis</div></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection