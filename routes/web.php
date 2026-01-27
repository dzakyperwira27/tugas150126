<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\MasukController;

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {

    $request->validate([
        'email'    => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('barang.index');
    }

    return back()->with('error', 'Email atau password salah');
});


Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('barang.index')
        : redirect()->route('login');
});


Route::middleware(['auth'])->group(function () {

    Route::resource('barang', BarangController::class);
    Route::resource('anggota', AnggotaController::class);
    Route::resource('supplier', SupplierController::class);
    Route::resource('masuk', MasukController::class);

    Route::post('/masuk/barang/{id}', 
        [MasukController::class, 'barang']
    )->name('masuk.barang');

    Route::post('/logout', function (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    })->name('logout');

});


// Route::resource('barang', BarangController::class);
// Route::resource('supplier', SupplierController::class);
// Route::resource('masuk', MasukController::class);

// /* PAKSA PARAMETER AGAR TETAP "anggota" */
// Route::resource('anggota', AnggotaController::class)
//     ->parameters(['anggota' => 'anggota']);
