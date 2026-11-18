@extends('layouts.app')

@section('content')
<div class="mb-4">
  <h3 class="font-weight-bold text-dark mb-1">Input Pre-Work Check Pekerja</h3>
  <p class="text-muted small mb-0">Catat hasil pemeriksaan kesehatan dan kelengkapan APD pekerja sebelum turun ke blok kebun.</p>
</div>

<div class="card shadow-sm border-0">
  <div class="card-body">
    @if($errors->any())
      <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('pre-work.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label class="font-weight-bold small">Pilih Pekerja yang Diperiksa</label>
        <select name="user_id" id="pilih_pekerja" class="form-control" required onchange="isiBlokOtomatis()">
          <option value="">-- Pilih Nama Pekerja --</option>
          @foreach($pekerja as $p)
            <option value="{{ $p->id }}" data-blok="{{ $p->blok_kerja }}">
              {{ $p->name }} ({{ $p->blok_kerja ?? 'Tanpa Blok' }})
            </option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label class="font-weight-bold small">Lokasi Blok Kerja</label>
        <input type="text" name="blok_kerja" id="blok_kerja" class="form-control" value="{{ old('blok_kerja') }}" placeholder="Otomatis terisi sesuai blok pekerja atau ketik manual" required>
      </div>

      <div class="form-group">
        <label class="font-weight-bold small">Kondisi Fisik Pekerja</label>
        <select name="kondisi_fisik" class="form-control" required>
          <option value="Sehat">Sehat & Siap Bekerja</option>
          <option value="Kurang Fit">Kurang Fit / Lelah</option>
        </select>
      </div>

      <div class="form-group">
        <label class="font-weight-bold small">Kelengkapan APD (Helm, Sepatu Boot, Sarung Tangan)</label>
        <select name="status_apd" class="form-control" required>
          <option value="Lengkap">Lengkap</option>
          <option value="Tidak Lengkap">Tidak Lengkap</option>
        </select>
      </div>

      <div class="form-group">
        <label class="font-weight-bold small">Catatan Pengawas (Opsional)</label>
        <textarea name="catatan" class="form-control" rows="3" placeholder="Tuliskan catatan pemeriksaan APD atau kondisi pekerja..."></textarea>
      </div>

      <div class="d-flex justify-content-end">
        <a href="{{ route('pre-work.index') }}" class="btn btn-light mr-2">Batal</a>
        <button type="submit" class="btn btn-success font-weight-bold">Simpan Hasil Pemeriksaan</button>
      </div>
    </form>
  </div>
</div>

<script>
function isiBlokOtomatis() {
  const select = document.getElementById('pilih_pekerja');
  const selectedOption = select.options[select.selectedIndex];
  const blok = selectedOption.getAttribute('data-blok') || '';
  document.getElementById('blok_kerja').value = blok;
}
</script>
@endsection