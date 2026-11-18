@extends('layouts.app')
@section('title', 'Tambah Blok Kerja - SIKAP Sawit')

@section('content')
<div class="row">
  <div class="col-md-8 mx-auto grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Data Blok Kerja Baru</h4>
        @if($errors->any())
          <div class="alert alert-danger py-2">
            <small>{{ $errors->first() }}</small>
          </div>
        @endif
        <form action="{{ route('blok-kerja.store') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Kode Blok</label>
                <input type="text" name="kode_blok" class="form-control" placeholder="Contoh: Blok A-01" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Afdeling</label>
                <input type="text" name="afdeling" class="form-control" placeholder="Contoh: Afdeling I" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Luas Area (Hektar) - Opsional</label>
                <input type="text" name="luas_hektar" class="form-control" placeholder="Contoh: 25.5">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Pengawas Penanggung Jawab</label>
                @if($pengawasList->count() > 0)
                  <select name="nama_pengawas" class="form-control" required>
                    @foreach($pengawasList as $pengawas)
                      <option value="{{ $pengawas->name }}">{{ $pengawas->name }}</option>
                    @endforeach
                  </select>
                @else
                  <input type="text" name="nama_pengawas" class="form-control" placeholder="Masukkan nama pengawas lapangan" required>
                @endif
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Status Blok</label>
            <select name="status_blok" class="form-control" required>
              <option value="Aktif">Aktif</option>
              <option value="Peremajaan (Replanting)">Peremajaan (Replanting)</option>
              <option value="Non-Aktif">Non-Aktif</option>
            </select>
          </div>
          <button type="submit" class="btn btn-success font-weight-bold mr-2">Simpan Blok Kerja</button>
          <a href="{{ route('blok-kerja.index') }}" class="btn btn-light">Batal</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection