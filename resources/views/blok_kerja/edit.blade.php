@extends('layouts.app')
@section('title', 'Edit Blok Kerja - SIKAP Sawit')

@section('content')
<div class="row">
  <div class="col-md-8 mx-auto grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Data Blok Kerja</h4>
        @if($errors->any())
          <div class="alert alert-danger py-2">
            <small>{{ $errors->first() }}</small>
          </div>
        @endif
        <form action="{{ route('blok-kerja.update', $blokKerja->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Kode Blok</label>
                <input type="text" name="kode_blok" class="form-control" value="{{ $blokKerja->kode_blok }}" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Afdeling</label>
                <input type="text" name="afdeling" class="form-control" value="{{ $blokKerja->afdeling }}" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Luas Area (Hektar)</label>
                <input type="text" name="luas_hektar" class="form-control" value="{{ $blokKerja->luas_hektar }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Pengawas Penanggung Jawab</label>
                @if($pengawasList->count() > 0)
                  <select name="nama_pengawas" class="form-control" required>
                    @foreach($pengawasList as $pengawas)
                      <option value="{{ $pengawas->name }}" {{ $blokKerja->nama_pengawas == $pengawas->name ? 'selected' : '' }}>{{ $pengawas->name }}</option>
                    @endforeach
                  </select>
                @else
                  <input type="text" name="nama_pengawas" class="form-control" value="{{ $blokKerja->nama_pengawas }}" required>
                @endif
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Status Blok</label>
            <select name="status_blok" class="form-control" required>
              <option value="Aktif" {{ $blokKerja->status_blok == 'Aktif' ? 'selected' : '' }}>Aktif</option>
              <option value="Peremajaan (Replanting)" {{ $blokKerja->status_blok == 'Peremajaan (Replanting)' ? 'selected' : '' }}>Peremajaan (Replanting)</option>
              <option value="Non-Aktif" {{ $blokKerja->status_blok == 'Non-Aktif' ? 'selected' : '' }}>Non-Aktif</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary font-weight-bold mr-2">Update Blok Kerja</button>
          <a href="{{ route('blok-kerja.index') }}" class="btn btn-light">Batal</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection