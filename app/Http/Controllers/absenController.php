<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class absenController extends Controller
{
    public function index()
    {
        $absensi = Absensi::all();
        return view('absen.index', compact('absensi'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_panwas' => 'required|string'
        ]);

        // Menyimpan data absensi baru
        Absensi::create([
            'nama_panwas' => $validated['nama_panwas'],
            'tanggal' => Carbon::now()->toDateString()
        ]);

        return redirect('/')->with('sukses', 'Anda berhasil absen');
    }
}
