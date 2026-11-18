<?php

namespace App\Http\Controllers;

use App\Models\BlokKerja;
use App\Models\User;
use Illuminate\Http\Request;

class BlokKerjaController extends Controller
{
    public function index()
    {
        $blokKerjas = BlokKerja::orderBy('kode_blok')->get();
        return view('blok_kerja.index', compact('blokKerjas'));
    }

    public function create()
    {
        $pengawasList = User::where('role', 'pengawas')->get();
        return view('blok_kerja.create', compact('pengawasList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_blok' => 'required|string|max:50|unique:blok_kerjas,kode_blok',
            'afdeling' => 'required|string|max:50',
            'luas_hektar' => 'nullable|string|max:30',
            'nama_pengawas' => 'required|string|max:100',
            'status_blok' => 'required|string|max:30',
        ]);

        BlokKerja::create($request->all());

        return redirect()->route('blok-kerja.index')->with('success', 'Data Blok Kerja berhasil ditambahkan!');
    }

    public function edit(BlokKerja $blokKerja)
    {
        $pengawasList = User::where('role', 'pengawas')->get();
        return view('blok_kerja.edit', compact('blokKerja', 'pengawasList'));
    }

    public function update(Request $request, BlokKerja $blokKerja)
    {
        $request->validate([
            'kode_blok' => 'required|string|max:50|unique:blok_kerjas,kode_blok,' . $blokKerja->id,
            'afdeling' => 'required|string|max:50',
            'luas_hektar' => 'nullable|string|max:30',
            'nama_pengawas' => 'required|string|max:100',
            'status_blok' => 'required|string|max:30',
        ]);

        $blokKerja->update($request->all());

        return redirect()->route('blok-kerja.index')->with('success', 'Data Blok Kerja berhasil diperbarui!');
    }

    public function destroy(BlokKerja $blokKerja)
    {
        $blokKerja->delete();

        return redirect()->route('blok-kerja.index')->with('success', 'Data Blok Kerja berhasil dihapus!');
    }
}