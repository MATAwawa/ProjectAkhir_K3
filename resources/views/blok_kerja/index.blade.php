@extends('layouts.app')
@section('title', 'Data Blok Kerja - SIKAP Sawit')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h3 class="font-weight-bold">Master Data Blok Kerja Perkebunan</h3>
        <h6 class="font-weight-normal mb-0 text-muted">Pengaturan pembagian wilayah afdeling dan pengawas lapangan K3</h6>
      </div>
      <a href="{{ route('blok-kerja.create') }}" class="btn btn-success font-weight-bold">+ Tambah Blok Kerja</a>
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
        <p class="card-title mb-3">Daftar Blok Kerja Aktif</p>
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead class="bg-light">
              <tr>
                <th>No</th>
                <th>Kode Blok</th>
                <th>Afdeling</th>
                <th>Luas Area</th>
                <th>Pengawas Penanggung Jawab</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse($blokKerjas as $index => $blok)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td class="font-weight-bold text-success">{{ $blok->kode_blok }}</td>
                <td>{{ $blok->afdeling }}</td>
                <td>{{ $blok->luas_hektar ? $blok->luas_hektar . ' Ha' : '-' }}</td>
                <td>{{ $blok->nama_pengawas }}</td>
                <td>
                  @if($blok->status_blok == 'Aktif')
                    <span class="badge badge-success">Aktif</span>
                  @else
                    <span class="badge badge-secondary">{{ $blok->status_blok }}</span>
                  @endif
                </td>
                <td>
                  <a href="{{ route('blok-kerja.edit', $blok->id) }}" class="btn btn-warning btn-sm">Edit</a>
                  <form action="{{ route('blok-kerja.destroy', $blok->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data blok ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                  </form>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="7" class="text-center text-muted py-4">
                  Belum ada data blok kerja. Silakan klik tombol "+ Tambah Blok Kerja".
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