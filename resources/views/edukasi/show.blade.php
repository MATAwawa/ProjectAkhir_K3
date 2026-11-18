@extends('layouts.app')
@section('title', $edukasi->judul . ' - SIKAP Sawit')

@section('content')
<div class="row">
  <div class="col-md-9 mx-auto grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="mb-3">
          <a href="{{ route('edukasi.index') }}" class="btn btn-light btn-sm">&larr; Kembali ke Daftar Edukasi</a>
        </div>
        <span class="badge badge-success mb-2">{{ $edukasi->kategori }}</span>
        <h3 class="font-weight-bold text-dark mb-2">{{ $edukasi->judul }}</h3>
        <p class="text-muted small mb-4">Dipublikasikan pada {{ $edukasi->created_at->format('d M Y') }}</p>
        <hr>
        <div class="mt-4" style="line-height: 1.8; font-size: 15px;">
          {!! nl2br(e($edukasi->konten)) !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection