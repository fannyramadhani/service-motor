<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceApiController extends Controller
{
    // Menampilkan semua daftar service
    public function index()
    {
        $services = Service::with(['pelanggan', 'kendaraan'])->get();

        return response()->json([
            'success' => true,
            'message' => 'Data service berhasil ditampilkan',
            'data' => $services
        ], 200);
    }

    // Menambahkan daftar service
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'keluhan' => 'required|string',
            'tanggal_service' => 'required|date',
        ]);

        $service = Service::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Daftar service berhasil ditambahkan',
            'data' => $service->load(['pelanggan', 'kendaraan'])
        ], 201);
    }

    // Menampilkan satu daftar service
    public function show(string $id)
    {
        $service = Service::with(['pelanggan', 'kendaraan'])->find($id);

        if (!$service) {
            return response()->json([
                'success' => false,
                'message' => 'Data service tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $service
        ], 200);
    }

    // Mengubah daftar service
    public function update(Request $request, string $id)
    {
        $service = Service::find($id);

        if (!$service) {
            return response()->json([
                'success' => false,
                'message' => 'Data service tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'keluhan' => 'required|string',
            'tanggal_service' => 'required|date',
        ]);

        $service->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data service berhasil diperbarui',
            'data' => $service->load(['pelanggan', 'kendaraan'])
        ], 200);
    }

    // Menghapus daftar service
    public function destroy(string $id)
    {
        $service = Service::find($id);

        if (!$service) {
            return response()->json([
                'success' => false,
                'message' => 'Data service tidak ditemukan'
            ], 404);
        }

        $service->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data service berhasil dihapus'
        ], 200);
    }
}
