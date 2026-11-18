<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Pelanggan;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with(['pelanggan', 'kendaraan'])->latest()->get();
        return view('service.index', compact('services'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        $kendaraans = Kendaraan::all();

        return view('service.create', compact('pelanggans', 'kendaraans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'keluhan' => 'required|string',
            'tanggal_service' => 'required|date',
        ]);

        Service::create($request->all());

        return redirect()->route('service.index')
            ->with('success', 'Daftar service berhasil ditambahkan.');
    }

    public function edit(Service $service)
    {
        $pelanggans = Pelanggan::all();
        $kendaraans = Kendaraan::all();

        return view('service.edit', compact('service', 'pelanggans', 'kendaraans'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'keluhan' => 'required|string',
            'tanggal_service' => 'required|date',
        ]);

        $service->update($request->all());

        return redirect()->route('service.index')
            ->with('success', 'Daftar service berhasil diperbarui.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('service.index')
            ->with('success', 'Daftar service berhasil dihapus.');
    }
}
