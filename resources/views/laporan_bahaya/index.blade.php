@extends('layouts.app')

@section('title', 'Laporan Bahaya & Insiden - SIKAP Sawit')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h3 class="font-weight-bold mb-1">Pelaporan Bahaya & Insiden K3</h3>
        <p class="text-muted mb-0">Laporkan potensi bahaya di lapangan dan pantau tindak lanjut pengawas</p>
      </div>
      <!-- Tombol Tambah Laporan (Create) -->
      <button type="button" class="btn btn-success btn-icon-text" data-toggle="modal" data-target="#modalTambahLaporan">
        <i class="ti-plus btn-icon-prepend"></i> Buat Laporan Bahaya
      </button>
    </div>
  </div>
</div>

<!-- Notifikasi Sukses / Error -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if($errors->any())
<div class="alert alert-danger">
  <ul class="mb-0">
    @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<!-- Tabel Daftar Laporan Bahaya (Read) -->
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Daftar Laporan Bahaya Masuk</h4>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal & Pelapor</th>
                <th>Lokasi Blok</th>
                <th>Jenis & Bahaya</th>
                <th>Deskripsi & Tindakan</th>
                <th>Foto</th>
                <th>Risiko</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse($laporans as $index => $item)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                  <strong>{{ $item->nama_pelapor }}</strong><br>
                  <small class="text-muted">{{ $item->created_at->format('d M Y, H:i') }}</small>
                </td>
                <td><span class="font-weight-bold">{{ $item->lokasi_blok }}</span></td>
                <td>
                  {{ $item->jenis_laporan }}<br>
                  <small class="text-muted">Kategori: {{ $item->jenis_bahaya }}</small>
                </td>
                <td style="max-width: 240px; white-space: normal;">
                  {{ $item->deskripsi }}
                  @if($item->tindakan_pengawas)
                    <div class="mt-2 p-2 bg-light rounded border-left border-success">
                      <small class="text-success font-weight-bold">Tindak Lanjut:</small><br>
                      <small>{{ $item->tindakan_pengawas }}</small>
                    </div>
                  @endif
                </td>
                <td>
                  @if($item->foto)
                    <a href="{{ asset('storage/' . $item->foto) }}" target="_blank">
                      <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto Bahaya" style="width: 60px; height: 60px; object-fit: cover; border-radius: 6px;">
                    </a>
                  @else
                    <span class="text-muted small">Tidak ada foto</span>
                  @endif
                </td>
                <td>
                  @if($item->tingkat_risiko == 'Tinggi')
                    <label class="badge badge-danger">Tinggi</label>
                  @elseif($item->tingkat_risiko == 'Sedang')
                    <label class="badge badge-warning">Sedang</label>
                  @else
                    <label class="badge badge-info">Rendah</label>
                  @endif
                </td>
                <td>
                  @if($item->status == 'Selesai')
                    <label class="badge badge-success">Selesai</label>
                  @elseif($item->status == 'Sedang Ditangani')
                    <label class="badge badge-primary">Sedang Ditangani</label>
                  @elseif($item->status == 'Ditinjau')
                    <label class="badge badge-warning">Ditinjau</label>
                  @else
                    <label class="badge badge-secondary">Dilaporkan</label>
                  @endif
                </td>
                <td>
                  <!-- Tombol Tindak Lanjut Pengawas (Update) -->
                  <button type="button" class="btn btn-sm btn-warning mb-1" data-toggle="modal" data-target="#modalTindakLanjut{{ $item->id }}">
                    Tindak Lanjut
                  </button>

                  <!-- Tombol Hapus (Delete) -->
                  <form action="{{ route('laporan-bahaya.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger mb-1">Hapus</button>
                  </form>
                </td>
              </tr>

              <!-- Modal Tindak Lanjut Pengawas (Update) -->
              <div class="modal fade" id="modalTindakLanjut{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <form action="{{ route('laporan-bahaya.update', $item->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="modal-header">
                        <h5 class="modal-title">Tindak Lanjut Laporan ({{ $item->lokasi_blok }})</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label>Status Penanganan</label>
                          <select name="status" class="form-control" required>
                            <option value="Dilaporkan" {{ $item->status == 'Dilaporkan' ? 'selected' : '' }}>Dilaporkan</option>
                            <option value="Ditinjau" {{ $item->status == 'Ditinjau' ? 'selected' : '' }}>Ditinjau</option>
                            <option value="Sedang Ditangani" {{ $item->status == 'Sedang Ditangani' ? 'selected' : '' }}>Sedang Ditangani</option>
                            <option value="Selesai" {{ $item->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Catatan Tindakan Pengawas</label>
                          <textarea name="tindakan_pengawas" class="form-control" rows="3" placeholder="Contoh: Area telah diamankan dan jalur kerja dialihkan.">{{ $item->tindakan_pengawas }}</textarea>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan Tindak Lanjut</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              @empty
              <tr>
                <td colspan="9" class="text-center text-muted py-4">Belum ada laporan bahaya yang masuk.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Form Tambah Laporan Bahaya (Create) -->
<div class="modal fade" id="modalTambahLaporan" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{ route('laporan-bahaya.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Buat Laporan Bahaya / Insiden Baru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Pelapor</label>
            <input type="text" name="nama_pelapor" class="form-control" placeholder="Masukkan nama pekerja" required>
          </div>
          <div class="row">
            <div class="col-md-6 form-group">
              <label>Jenis Laporan</label>
              <select name="jenis_laporan" class="form-control" required>
                <option value="Potensi Bahaya">Potensi Bahaya</option>
                <option value="Insiden">Insiden</option>
                <option value="Kecelakaan Kerja">Kecelakaan Kerja</option>
              </select>
            </div>
            <div class="col-md-6 form-group">
              <label>Lokasi Blok Kerja</label>
              <input type="text" name="lokasi_blok" class="form-control" placeholder="Contoh: Blok B-03" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group">
              <label>Jenis Bahaya</label>
              <select name="jenis_bahaya" class="form-control" required>
                <option value="Alat">Alat</option>
                <option value="Lingkungan">Lingkungan</option>
                <option value="APD">APD</option>
                <option value="Kendaraan">Kendaraan</option>
                <option value="Lainnya">Lainnya</option>
              </select>
            </div>
            <div class="col-md-6 form-group">
              <label>Tingkat Risiko</label>
              <select name="tingkat_risiko" class="form-control" required>
                <option value="Rendah">Rendah</option>
                <option value="Sedang">Sedang</option>
                <option value="Tinggi">Tinggi</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label>Deskripsi Singkat Kejadian</label>
            <textarea name="deskripsi" class="form-control" rows="3" placeholder="Contoh: Pelepah sawit kering menggantung di jalur panen" required></textarea>
          </div>
          <div class="form-group">
            <label>Foto Pendukung (Opsional)</label>
            <input type="file" name="foto" class="form-control-file" accept="image/*">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success">Kirim Laporan</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection