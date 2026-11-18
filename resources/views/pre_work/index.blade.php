@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <h3 class="font-weight-bold text-dark mb-1">Data Pre-Work Check</h3>
    <p class="text-muted small mb-0">Pemeriksaan kesiapan kerja, kesehatan, dan kelengkapan APD sebelum bertugas.</p>
  </div>
  @if(Auth::user()->role === 'pengawas')
    <a href="{{ route('pre-work.create') }}" class="btn btn-success font-weight-bold">
      + Input Pre-Work Check
    </a>
  @endif
</div>

@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow-sm border-0">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="thead-light">
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Pekerja</th>
            <th>Blok Kerja</th>
            <th>Kondisi Fisik</th>
            <th>Kelengkapan APD</th>
            <th>Catatan</th>
          </tr>
        </thead>
        <tbody>
          @forelse($checks as $index => $item)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $item->created_at->format('d M Y, H:i') }}</td>
              <td class="font-weight-bold">{{ $item->user->name ?? '-' }}</td>
              <td>{{ $item->blok_kerja ?? ($item->user->blok_kerja ?? '-') }}</td>
              <td>
                <span class="badge {{ ($item->kondisi_fisik ?? 'Sehat') === 'Sehat' ? 'badge-success' : 'badge-warning' }}">
                  {{ $item->kondisi_fisik ?? 'Sehat' }}
                </span>
              </td>
              <td>
                <span class="badge {{ ($item->status_apd ?? 'Lengkap') === 'Lengkap' ? 'badge-success' : 'badge-danger' }}">
                  {{ $item->status_apd ?? 'Lengkap' }}
                </span>
              </td>
              <td>{{ $item->catatan ?? '-' }}</td>
            </tr>
          @empty
            <tr>
              <td colspan="7" class="text-center text-muted py-4">
                Belum ada data Pre-Work Check yang tercatat.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection