<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraans = Kendaraan::latest()->get();
        return view('kendaraan.index', compact('kendaraans'));
    }

    public function create()
    {
        return view('kendaraan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_plat' => 'required|string|max:255|unique:kendaraans,no_plat',
            'jenis_kendaraan' => 'required|in:Matic,Manual Transmisi',
            'no_stnk' => 'required|string|max:255',
            'tahun_pembuatan' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'nama_pemilik' => 'required|string|max:255',
            'warna' => 'required|string|max:255',
        ]);

        Kendaraan::create($request->all());

        return redirect()->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil ditambahkan.');
    }

    public function edit(Kendaraan $kendaraan)
    {
        return view('kendaraan.edit', compact('kendaraan'));
    }

    public function update(Request $request, Kendaraan $kendaraan)
    {
        $request->validate([
            'no_plat' => 'required|string|max:255|unique:kendaraans,no_plat,' . $kendaraan->id,
            'jenis_kendaraan' => 'required|in:Matic,Manual Transmisi',
            'no_stnk' => 'required|string|max:255',
            'tahun_pembuatan' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'nama_pemilik' => 'required|string|max:255',
            'warna' => 'required|string|max:255',
        ]);

        $kendaraan->update($request->all());

        return redirect()->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil diperbarui.');
    }

    public function destroy(Kendaraan $kendaraan)
    {
        $kendaraan->delete();

        return redirect()->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil dihapus.');
    }
}
