<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin 
Route::middleware('auth')->group(function () {
    Route::get('/admin', function () {
        return redirect()->route('admin.dashboard');
    });
    Route::get('/admin/dashboard', [ProdukController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/addProduct', [ProdukController::class, 'addProduk']);
    Route::post('/produk/store', [ProdukController::class, 'store'])->name('admin.produk.store');
    // Admin edit ProdukController
    Route::get('/admin/produk/edit/{id}', [ProdukController::class, 'edit'])->name('admin.produk.edit');
    // Admin update ProdukController
    Route::put('/admin/produk/update/{id}', [ProdukController::class, 'update'])->name('admin.produk.update');
    // Admin delete ProdukController
    Route::delete('/admin/produk/delete/{id}', [ProdukController::class, 'destroy'])->name('admin.produk.delete');
});

// home
Route::get('/', [HomeController::class, 'index'])->name('home');


require __DIR__ . '/auth.php';
