<?php

namespace App\Http\Controllers;

use App\Models\PreWorkCheck;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreWorkCheckController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'pekerja') {
            $checks = PreWorkCheck::with('user')->where('user_id', $user->id)->latest()->get();
        } else {
            $checks = PreWorkCheck::with('user')->latest()->get();
        }

        return view('pre_work.index', compact('checks'));
    }

    public function create()
    {
        if (Auth::user()->role !== 'pengawas') {
            abort(403, 'Hanya Pengawas yang dapat menginputkan Pre-Work Check.');
        }

        $pekerja = User::where('role', 'pekerja')->orderBy('name')->get();
        return view('pre_work.create', compact('pekerja'));
    }

    public function store(Request $request)
    {
        if (Auth::user()->role !== 'pengawas') {
            abort(403, 'Hanya Pengawas yang dapat menginputkan Pre-Work Check.');
        }

        $request->validate([
            'user_id'       => 'required|exists:users,id',
            'blok_kerja'    => 'required|string|max:100',
            'kondisi_fisik' => 'required|string|max:100',
            'status_apd'    => 'required|string|max:100',
            'catatan'       => 'nullable|string',
        ]);

        PreWorkCheck::create([
            'user_id'       => $request->user_id,
            'blok_kerja'    => $request->blok_kerja,
            'kondisi_fisik' => $request->kondisi_fisik,
            'status_apd'    => $request->status_apd,
            'catatan'       => $request->catatan,
        ]);

        return redirect()->route('pre-work.index')->with('success', 'Data Pre-Work Check pekerja berhasil dicatat.');
    }
}