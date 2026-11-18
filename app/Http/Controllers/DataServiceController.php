<?php

namespace App\Http\Controllers;

use App\Models\DataService;
use App\Models\Service;
use Illuminate\Http\Request;

class DataServiceController extends Controller
{
    public function index()
    {
        $dataServices = DataService::with('service')->latest()->get();

        return view('data_service.index', compact('dataServices'));
    }

    public function create()
    {
        $services = Service::all();

        return view('data_service.create', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'keluhan' => 'required|string',
            'estimasi_service' => 'required|string',
            'nama_mekanik' => 'required|string|max:255',
            'sparepart_pengganti' => 'nullable|string',
        ]);

        DataService::create($request->all());

        return redirect()->route('data-service.index')
            ->with('success', 'Data service berhasil ditambahkan.');
    }

    public function edit(DataService $dataService)
    {
        $services = Service::all();

        return view('data_service.edit', compact('dataService', 'services'));
    }

    public function update(Request $request, DataService $dataService)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'keluhan' => 'required|string',
            'estimasi_service' => 'required|string',
            'nama_mekanik' => 'required|string|max:255',
            'sparepart_pengganti' => 'nullable|string',
        ]);

        $dataService->update($request->all());

        return redirect()->route('data-service.index')
            ->with('success', 'Data service berhasil diperbarui.');
    }

    public function destroy(DataService $dataService)
    {
        $dataService->delete();

        return redirect()->route('data-service.index')
            ->with('success', 'Data service berhasil dihapus.');
    }
}