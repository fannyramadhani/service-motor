<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DataService;
use Illuminate\Http\Request;

class DataServiceApiController extends Controller
{
    // Menampilkan semua data service
    public function index()
    {
        $dataService = DataService::with('service')->get();

        return response()->json([
            'success' => true,
            'message' => 'Data service berhasil ditampilkan',
            'data' => $dataService
        ], 200);
    }

    // Menambahkan data service
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'keluhan' => 'required|string',
            'estimasi_service' => 'required|string|max:255',
            'nama_mekanik' => 'required|string|max:255',
            'sparepart_pengganti' => 'nullable|string',
        ]);

        $dataService = DataService::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data service berhasil ditambahkan',
            'data' => $dataService->load('service')
        ], 201);
    }

    // Menampilkan satu data service
    public function show(string $id)
    {
        $dataService = DataService::with('service')->find($id);

        if (!$dataService) {
            return response()->json([
                'success' => false,
                'message' => 'Data service tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $dataService
        ], 200);
    }

    // Mengubah data service
    public function update(Request $request, string $id)
    {
        $dataService = DataService::find($id);

        if (!$dataService) {
            return response()->json([
                'success' => false,
                'message' => 'Data service tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'keluhan' => 'required|string',
            'estimasi_service' => 'required|string|max:255',
            'nama_mekanik' => 'required|string|max:255',
            'sparepart_pengganti' => 'nullable|string',
        ]);

        $dataService->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data service berhasil diperbarui',
            'data' => $dataService->load('service')
        ], 200);
    }

    // Menghapus data service
    public function destroy(string $id)
    {
        $dataService = DataService::find($id);

        if (!$dataService) {
            return response()->json([
                'success' => false,
                'message' => 'Data service tidak ditemukan'
            ], 404);
        }

        $dataService->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data service berhasil dihapus'
        ], 200);
    }
}
