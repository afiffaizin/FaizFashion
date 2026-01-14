<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('pages.home');
// });


// Admin 
Route::get('/admin/dashboard', [ProdukController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/addProduct', [ProdukController::class, 'addProduk']);
Route::post('/produk/store', [ProdukController::class, 'store'])->name('admin.produk.store');
// Admin edit ProdukController
Route::get('/admin/produk/edit/{id}', [ProdukController::class, 'edit'])->name('admin.produk.edit');
// Admin update ProdukController
Route::put('/admin/produk/update/{id}', [ProdukController::class, 'update'])->name('admin.produk.update');
// Admin delete ProdukController
Route::delete('/admin/produk/delete/{id}', [ProdukController::class, 'destroy'])->name('admin.produk.delete');


// home
Route::get('/', [HomeController::class, 'index'])->name('home');
