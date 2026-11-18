<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Service;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::with('service')->latest()->get();

        return view('pembayaran.index', compact('pembayarans'));
    }

    public function create()
    {
        $services = Service::all();

        return view('pembayaran.create', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'jumlah_biaya' => 'required|numeric|min:0',
            'jenis_pembayaran' => 'required|in:Cash/Tunai,Non Tunai',
            'keterangan' => 'nullable|string',
        ]);

        Pembayaran::create($request->all());

        return redirect()->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil ditambahkan.');
    }

    public function edit(Pembayaran $pembayaran)
    {
        $services = Service::all();

        return view('pembayaran.edit', compact('pembayaran', 'services'));
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'jumlah_biaya' => 'required|numeric|min:0',
            'jenis_pembayaran' => 'required|in:Cash/Tunai,Non Tunai',
            'keterangan' => 'nullable|string',
        ]);

        $pembayaran->update($request->all());

        return redirect()->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil diperbarui.');
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();

        return redirect()->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil dihapus.');
    }
}