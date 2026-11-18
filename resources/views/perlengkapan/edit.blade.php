@extends('layouts.app')
@section('title', 'Edit Perlengkapan APD - SIKAP Sawit')

@section('content')
<div class="row">
  <div class="col-md-8 mx-auto grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Data Perlengkapan & APD</h4>
        <form action="{{ route('perlengkapan.update', $perlengkapan->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label>Nama Perlengkapan / APD</label>
            <input type="text" name="nama_apd" class="form-control" value="{{ $perlengkapan->nama_apd }}" required>
          </div>
          <div class="form-group">
            <label>Kategori</label>
            <select name="kategori" class="form-control" required>
              <option value="APD Wajib" {{ $perlengkapan->kategori == 'APD Wajib' ? 'selected' : '' }}>APD Wajib</option>
              <option value="APD Khusus Panen" {{ $perlengkapan->kategori == 'APD Khusus Panen' ? 'selected' : '' }}>APD Khusus Panen</option>
              <option value="Peralatan P3K" {{ $perlengkapan->kategori == 'Peralatan P3K' ? 'selected' : '' }}>Peralatan P3K</option>
              <option value="Rambu & Pengaman" {{ $perlengkapan->kategori == 'Rambu & Pengaman' ? 'selected' : '' }}>Rambu & Pengaman</option>
            </select>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Stok Saat Ini</label>
                <input type="number" name="stok" class="form-control" min="0" value="{{ $perlengkapan->stok }}" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Batas Stok Minimum</label>
                <input type="number" name="stok_minimum" class="form-control" min="1" value="{{ $perlengkapan->stok_minimum }}" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Satuan</label>
                <input type="text" name="satuan" class="form-control" value="{{ $perlengkapan->satuan }}" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Keterangan (Opsional)</label>
            <textarea name="keterangan" class="form-control" rows="2">{{ $perlengkapan->keterangan }}</textarea>
          </div>
          <button type="submit" class="btn btn-primary font-weight-bold mr-2">Update Data</button>
          <a href="{{ route('perlengkapan.index') }}" class="btn btn-light">Batal</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection