<?php

namespace App\Http\Controllers;

use App\Models\Perlengkapan;
use Illuminate\Http\Request;

class PerlengkapanController extends Controller
{
    public function index()
    {
        $perlengkapans = Perlengkapan::latest()->get();
        return view('perlengkapan.index', compact('perlengkapans'));
    }

    public function create()
    {
        return view('perlengkapan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_apd' => 'required|string|max:100',
            'kategori' => 'required|string|max:50',
            'stok' => 'required|integer|min:0',
            'stok_minimum' => 'required|integer|min:1',
            'satuan' => 'required|string|max:30',
            'keterangan' => 'nullable|string',
        ]);

        Perlengkapan::create($request->all());

        return redirect()->route('perlengkapan.index')->with('success', 'Data perlengkapan APD berhasil ditambahkan!');
    }

    public function edit(Perlengkapan $perlengkapan)
    {
        return view('perlengkapan.edit', compact('perlengkapan'));
    }

    public function update(Request $request, Perlengkapan $perlengkapan)
    {
        $request->validate([
            'nama_apd' => 'required|string|max:100',
            'kategori' => 'required|string|max:50',
            'stok' => 'required|integer|min:0',
            'stok_minimum' => 'required|integer|min:1',
            'satuan' => 'required|string|max:30',
            'keterangan' => 'nullable|string',
        ]);

        $perlengkapan->update($request->all());

        return redirect()->route('perlengkapan.index')->with('success', 'Data perlengkapan APD berhasil diperbarui!');
    }

    public function destroy(Perlengkapan $perlengkapan)
    {
        $perlengkapan->delete();

        return redirect()->route('perlengkapan.index')->with('success', 'Data perlengkapan APD berhasil dihapus!');
    }
}