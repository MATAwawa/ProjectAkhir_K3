<?php

namespace App\Http\Controllers;

use App\Models\Edukasi;
use Illuminate\Http\Request;

class EdukasiController extends Controller
{
    public function index()
    {
        $edukasis = Edukasi::latest()->get();
        return view('edukasi.index', compact('edukasis'));
    }

    public function create()
    {
        return view('edukasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:150',
            'kategori' => 'required|string|max:50',
            'ringkasan' => 'required|string|max:255',
            'konten' => 'required|string',
        ]);

        Edukasi::create($request->all());

        return redirect()->route('edukasi.index')->with('success', 'Materi Edukasi K3 berhasil ditambahkan!');
    }

    public function show(Edukasi $edukasi)
    {
        return view('edukasi.show', compact('edukasi'));
    }

    public function destroy(Edukasi $edukasi)
    {
        $edukasi->delete();

        return redirect()->route('edukasi.index')->with('success', 'Materi Edukasi K3 berhasil dihapus!');
    }
}