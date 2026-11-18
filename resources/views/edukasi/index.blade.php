@extends('layouts.app')
@section('title', 'Modul Edukasi K3 - SIKAP Sawit')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h3 class="font-weight-bold">Modul Edukasi & SOP K3 Perkebunan</h3>
        <h6 class="font-weight-normal mb-0 text-muted">Panduan keselamatan kerja panen, pemupukan, penggunaan APD, dan penanganan darurat</h6>
      </div>
      @if(Auth::user()->role === 'admin')
        <a href="{{ route('edukasi.create') }}" class="btn btn-success font-weight-bold">+ Tambah Materi K3</a>
      @endif
    </div>
  </div>
</div>

@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="row">
  @forelse($edukasis as $item)
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card shadow-sm">
      <div class="card-body d-flex flex-column justify-content-between">
        <div>
          <span class="badge badge-success mb-2">{{ $item->kategori }}</span>
          <h4 class="card-title text-dark">{{ $item->judul }}</h4>
          <p class="text-muted small">{{ $item->ringkasan }}</p>
        </div>
        <div class="mt-3 pt-2 border-top d-flex justify-content-between align-items-center">
          <a href="{{ route('edukasi.show', $item->id) }}" class="btn btn-outline-success btn-sm font-weight-bold">Baca Materi &rarr;</a>
          @if(Auth::user()->role === 'admin')
            <form action="{{ route('edukasi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus materi edukasi ini?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
            </form>
          @endif
        </div>
      </div>
    </div>
  </div>
  @empty
  <div class="col-md-12">
    <div class="card">
      <div class="card-body text-center py-5 text-muted">
        Belum ada materi edukasi K3 yang dipublikasikan.
      </div>
    </div>
  </div>
  @endforelse
</div>
@endsection