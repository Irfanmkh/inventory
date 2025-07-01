<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\MasterProdukController;
use App\Http\Controllers\MasterPemasokController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ReturBarangController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Owner\ManajemenUserController;

// ==============================
// LOGIN ROUTES
// ==============================
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ==============================
// DASHBOARD ROUTES
// ==============================






Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->hasRole('admin')) {
        return redirect()->route('admin.dashboard');
    }

    // Jika ada role lain
    if ($user->hasRole('owner')) {
        return redirect()->route('owner.dashboard');
    }

    abort(403);
})->middleware('auth');

// ==============================
// ADMIN ROUTES
// ==============================
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); // → resources/views/admin/dashboard.blade.php
    })->name('dashboard');
    // MASTER PRODUK
    Route::get('/masterproduk', [MasterProdukController::class, 'index'])->name('masterproduk.index');
    Route::get('/masterproduk/create', [MasterProdukController::class, 'create'])->name('masterproduk.create');
    Route::post('/masterproduk/store', [MasterProdukController::class, 'store'])->name('masterproduk.store');
    Route::get('/masterproduk/edit/{id}', [MasterProdukController::class, 'edit'])->name('masterproduk.edit');
    Route::get('/masterproduk/show/{id}', [MasterProdukController::class, 'show'])->name('masterproduk.show');
    Route::put('/masterproduk/update/{id}', [MasterProdukController::class, 'update'])->name('masterproduk.update');
    Route::delete('/masterproduk/delete/{id}', [MasterProdukController::class, 'destroy'])->name('masterproduk.destroy');

    // MASTER PEMASOK
    Route::get('/masterpemasok', [MasterPemasokController::class, 'index'])->name('masterpemasok.index');
    Route::get('/masterpemasok/create', [MasterPemasokController::class, 'create'])->name('masterpemasok.create');
    Route::post('/masterpemasok/store', [MasterPemasokController::class, 'store'])->name('masterpemasok.store');
    Route::get('/masterpemasok/edit/{id}', [MasterPemasokController::class, 'edit'])->name('masterpemasok.edit');
    Route::get('/masterpemasok/show/{id}', [MasterPemasokController::class, 'show'])->name('masterpemasok.show');
    Route::put('/masterpemasok/update/{id}', [MasterPemasokController::class, 'update'])->name('masterpemasok.update');
    Route::delete('/masterpemasok/delete/{id}', [MasterPemasokController::class, 'destroy'])->name('masterpemasok.destroy');

    // PEMBELIAN
    Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian.index');
    Route::get('/pembelian/create', [PembelianController::class, 'create'])->name('pembelian.create');
    Route::post('/pembelian/store', [PembelianController::class, 'store'])->name('pembelian.store');
    Route::get('/pembelian/edit/{id}', [PembelianController::class, 'edit'])->name('pembelian.edit');
    Route::get('/pembelian/show/{id}', [PembelianController::class, 'show'])->name('pembelian.show');
    Route::put('/pembelian/update/{id}', [PembelianController::class, 'update'])->name('pembelian.update');
    Route::delete('/pembelian/delete/{id}', [PembelianController::class, 'destroy'])->name('pembelian.destroy');

    // PENJUALAN
    Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
    Route::get('/penjualan/create', [PenjualanController::class, 'create'])->name('penjualan.create');
    Route::post('/penjualan/store', [PenjualanController::class, 'store'])->name('penjualan.store');
    Route::get('/penjualan/show/{id}', [PenjualanController::class, 'show'])->name('penjualan.show');
    Route::get('/penjualan/edit/{id}', [PenjualanController::class, 'edit'])->name('penjualan.edit');
    Route::put('/penjualan/update/{id}', [PenjualanController::class, 'update'])->name('penjualan.update');
    Route::delete('/penjualan/delete/{id}', [PenjualanController::class, 'destroy'])->name('penjualan.destroy');

    // RETUR BARANG
    Route::get('/retur-barang', [ReturBarangController::class, 'index'])->name('retur.index');
    Route::get('/retur-barang/create', [ReturBarangController::class, 'create'])->name('retur.create');
    Route::post('/retur-barang', [ReturBarangController::class, 'store'])->name('retur.store');
    Route::get('/retur-barang/edit/{id}', [ReturBarangController::class, 'edit'])->name('retur.edit');
    Route::put('/retur-barang/update/{id}', [ReturBarangController::class, 'update'])->name('retur.update');
    Route::get('/retur-barang/show/{id}', [ReturBarangController::class, 'show'])->name('retur.show');
    Route::delete('/retur-barang/{id}', [ReturBarangController::class, 'destroy'])->name('retur.destroy');
});

// ==============================
// OWNER ROUTES
// ==============================
Route::middleware(['auth', 'role:owner'])->prefix('owner')->name('owner.')->group(function () {

    Route::get('/dashboard', function () {
        return view('owner.dashboard'); // → resources/views/admin/dashboard.blade.php
    })->name('dashboard');
    Route::get('/manajemen-user', [ManajemenUserController::class, 'index'])->name('manajemen-user.index');
    Route::get('/manajemen-user/create', [ManajemenUserController::class, 'create'])->name('manajemen-user.create');
    Route::post('/manajemen-user', [ManajemenUserController::class, 'store'])->name('manajemen-user.store');
    Route::get('/manajemen-user/{id}/edit', [ManajemenUserController::class, 'edit'])->name('manajemen-user.edit');
    Route::put('/manajemen-user/{id}', [ManajemenUserController::class, 'update'])->name('manajemen-user.update');
    Route::delete('/manajemen-user/{id}', [ManajemenUserController::class, 'destroy'])->name('manajemen-user.destroy');
});
