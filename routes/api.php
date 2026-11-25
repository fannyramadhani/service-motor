<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PelangganApiController;
use App\Http\Controllers\Api\KendaraanApiController;
use App\Http\Controllers\Api\ServiceApiController;
use App\Http\Controllers\Api\DataServiceApiController;
use App\Http\Controllers\Api\PembayaranApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::name('api.')->group(function () {

    // API Data Pelanggan
    Route::apiResource('pelanggan', PelangganApiController::class);

    // API Data Kendaraan
    Route::apiResource('kendaraan', KendaraanApiController::class);

    // API Daftar Service
    Route::apiResource('service', ServiceApiController::class);

    // API Data Service
    Route::apiResource('data-service', DataServiceApiController::class);

    // API Pembayaran
    Route::apiResource('pembayaran', PembayaranApiController::class);

});
