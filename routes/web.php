<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AnggotaController;

/*
|--------------------------------------------------------------------------
| Redirect root ke halaman Barang
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('barang.index');
});

/*
|--------------------------------------------------------------------------
| Resource Routes
|--------------------------------------------------------------------------
*/
Route::resource('barang', BarangController::class);
Route::resource('supplier', SupplierController::class);

/* PAKSA PARAMETER AGAR TETAP "anggota" */
Route::resource('anggota', AnggotaController::class)
    ->parameters(['anggota' => 'anggota']);
