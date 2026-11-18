<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranApiController extends Controller
{
    public function index()
    {
        $data = Pembayaran::with('service')->get();

        return response()->json([
            'success' => true,
            'message' => 'Data pembayaran berhasil ditampilkan',
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'jumlah_biaya' => 'required|numeric|min:0',
            'jenis_pembayaran' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        $data = Pembayaran::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data pembayaran berhasil ditambahkan',
            'data' => $data->load('service')
        ], 201);
    }

    public function show(string $id)
    {
        $data = Pembayaran::with('service')->find($id);

        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Data pembayaran tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail pembayaran berhasil ditampilkan',
            'data' => $data
        ]);
    }

    public function update(Request $request, string $id)
    {
        $data = Pembayaran::find($id);

        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Data pembayaran tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'service_id' => 'sometimes|required|exists:services,id',
            'jumlah_biaya' => 'sometimes|required|numeric|min:0',
            'jenis_pembayaran' => 'sometimes|required|string',
            'keterangan' => 'nullable|string',
        ]);

        $data->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data pembayaran berhasil diperbarui',
            'data' => $data->load('service')
        ]);
    }

    public function destroy(string $id)
    {
        $data = Pembayaran::find($id);

        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Data pembayaran tidak ditemukan'
            ], 404);
        }

        $data->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data pembayaran berhasil dihapus'
        ]);
    }
}
