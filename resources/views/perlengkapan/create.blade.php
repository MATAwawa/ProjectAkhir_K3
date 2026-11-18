@extends('layouts.app')
@section('title', 'Tambah Perlengkapan APD - SIKAP Sawit')

@section('content')
<div class="row">
  <div class="col-md-8 mx-auto grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Perlengkapan & APD Baru</h4>
        <form action="{{ route('perlengkapan.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label>Nama Perlengkapan / APD</label>
            <input type="text" name="nama_apd" class="form-control" placeholder="Contoh: Helm Safety Proyek" required>
          </div>
          <div class="form-group">
            <label>Kategori</label>
            <select name="kategori" class="form-control" required>
              <option value="APD Wajib">APD Wajib</option>
              <option value="APD Khusus Panen">APD Khusus Panen</option>
              <option value="Peralatan P3K">Peralatan P3K</option>
              <option value="Rambu & Pengaman">Rambu & Pengaman</option>
            </select>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Stok Saat Ini</label>
                <input type="number" name="stok" class="form-control" min="0" value="0" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Batas Stok Minimum</label>
                <input type="number" name="stok_minimum" class="form-control" min="1" value="10" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Satuan</label>
                <input type="text" name="satuan" class="form-control" placeholder="Unit / Pasang / Kotak" value="Unit" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Keterangan (Opsional)</label>
            <textarea name="keterangan" class="form-control" rows="2" placeholder="Catatan spesifikasi atau lokasi gudang penyimpanan..."></textarea>
          </div>
          <button type="submit" class="btn btn-success font-weight-bold mr-2">Simpan Data</button>
          <a href="{{ route('perlengkapan.index') }}" class="btn btn-light">Batal</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection