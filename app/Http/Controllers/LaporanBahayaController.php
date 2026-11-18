<?php

namespace App\Http\Controllers;

use App\Models\LaporanBahaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanBahayaController extends Controller
{
    public function index()
    {
        $laporans = LaporanBahaya::latest()->get();
        return view('laporan_bahaya.index', compact('laporans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelapor'  => 'required|string|max:255',
            'jenis_laporan' => 'required|in:Potensi Bahaya,Insiden,Kecelakaan Kerja',
            'lokasi_blok'   => 'required|string|max:255',
            'jenis_bahaya'  => 'required|in:Alat,Lingkungan,APD,Kendaraan,Lainnya',
            'deskripsi'     => 'required|string',
            'tingkat_risiko'=> 'required|in:Rendah,Sedang,Tinggi',
            'foto'          => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('laporan_bahaya', 'public');
        }

        LaporanBahaya::create($data);

        return redirect()->route('laporan-bahaya.index')->with('success', 'Laporan bahaya berhasil dikirim!');
    }

    public function update(Request $request, LaporanBahaya $laporanBahaya)
    {
        $request->validate([
            'status'            => 'required|in:Dilaporkan,Ditinjau,Sedang Ditangani,Selesai',
            'tindakan_pengawas' => 'nullable|string',
        ]);

        $laporanBahaya->update([
            'status'            => $request->status,
            'tindakan_pengawas' => $request->tindakan_pengawas,
        ]);

        return redirect()->route('laporan-bahaya.index')->with('success', 'Status & tindak lanjut berhasil diperbarui!');
    }

    public function destroy(LaporanBahaya $laporanBahaya)
    {
        if ($laporanBahaya->foto) {
            Storage::disk('public')->delete($laporanBahaya->foto);
        }

        $laporanBahaya->delete();

        return redirect()->route('laporan-bahaya.index')->with('success', 'Laporan bahaya berhasil dihapus!');
    }
}