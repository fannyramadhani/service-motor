<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DataServiceController;
use App\Http\Controllers\PembayaranController;

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('pelanggan', PelangganController::class);
Route::resource('kendaraan', KendaraanController::class);
Route::resource('service', ServiceController::class);
Route::resource('data-service', DataServiceController::class);
Route::resource('pembayaran', PembayaranController::class);