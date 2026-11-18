@extends('layouts.app')
@section('title', 'Tambah Materi Edukasi K3 - SIKAP Sawit')

@section('content')
<div class="row">
  <div class="col-md-8 mx-auto grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Materi Edukasi & SOP K3</h4>
        <form action="{{ route('edukasi.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label>Judul Materi / SOP</label>
            <input type="text" name="judul" class="form-control" placeholder="Contoh: SOP Panen Buah Sawit Pokok Tinggi Menggunakan Egrek" required>
          </div>
          <div class="form-group">
            <label>Kategori Materi</label>
            <select name="kategori" class="form-control" required>
              <option value="SOP Panen & Perawatan">SOP Panen & Perawatan</option>
              <option value="Panduan APD">Panduan Penggunaan APD</option>
              <option value="Keselamatan Transportasi">Keselamatan Transportasi & Angkut</option>
              <option value="P3K & Tanggap Darurat">P3K & Tanggap Darurat</option>
            </select>
          </div>
          <div class="form-group">
            <label>Ringkasan Singkat</label>
            <input type="text" name="ringkasan" class="form-control" placeholder="Penjelasan singkat 1-2 kalimat yang muncul di kartu materi..." required>
          </div>
          <div class="form-group">
            <label>Isi Lengkap Materi / Langkah Keselamatan</label>
            <textarea name="konten" class="form-control" rows="7" placeholder="Tuliskan langkah-langkah keselamatan kerja secara detail..." required></textarea>
          </div>
          <button type="submit" class="btn btn-success font-weight-bold mr-2">Publikasikan Materi</button>
          <a href="{{ route('edukasi.index') }}" class="btn btn-light">Batal</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection