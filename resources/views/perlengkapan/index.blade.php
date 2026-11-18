@extends('layouts.app')
@section('title', 'Perlengkapan & APD - SIKAP Sawit')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h3 class="font-weight-bold">Manajemen Perlengkapan & APD</h3>
        <h6 class="font-weight-normal mb-0 text-muted">Pemantauan stok Alat Pelindung Diri (APD) dan perlengkapan K3 perkebunan</h6>
      </div>
      @if(Auth::user()->role === 'admin')
        <a href="{{ route('perlengkapan.create') }}" class="btn btn-success font-weight-bold">+ Tambah Perlengkapan APD</a>
      @endif
    </div>
  </div>
</div>

@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <p class="card-title mb-3">Daftar Stok Perlengkapan K3</p>
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead class="bg-light">
              <tr>
                <th>No</th>
                <th>Nama Perlengkapan / APD</th>
                <th>Kategori</th>
                <th>Stok Saat Ini</th>
                <th>Batas Minimum</th>
                <th>Status Stok</th>
                <th>Keterangan</th>
                @if(Auth::user()->role === 'admin')
                  <th>Aksi</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @forelse($perlengkapans as $index => $item)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td class="font-weight-bold">{{ $item->nama_apd }}</td>
                <td>{{ $item->kategori }}</td>
                <td class="font-weight-bold">{{ $item->stok }} {{ $item->satuan }}</td>
                <td>{{ $item->stok_minimum }} {{ $item->satuan }}</td>
                <td>
                  @if($item->stok == 0)
                    <span class="badge badge-danger">Habis</span>
                  @elseif($item->stok <= $item->stok_minimum)
                    <span class="badge badge-warning">Menipis</span>
                  @else
                    <span class="badge badge-success">Aman</span>
                  @endif
                </td>
                <td>{{ $item->keterangan ?? '-' }}</td>
                @if(Auth::user()->role === 'admin')
                <td>
                  <a href="{{ route('perlengkapan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                  <form action="{{ route('perlengkapan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data APD ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                  </form>
                </td>
                @endif
              </tr>
              @empty
              <tr>
                <td colspan="{{ Auth::user()->role === 'admin' ? 8 : 7 }}" class="text-center text-muted py-4">
                  Belum ada data perlengkapan APD. Silakan tambahkan data baru.
                </td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection