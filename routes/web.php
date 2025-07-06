<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('master-data')
        ->as('master-data.')
        ->group(function () {
            Route::prefix('kategori')
                ->as('kategori.')
                ->controller(KategoriController::class)
                ->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::post('/', 'store')->name('store');
                    Route::put('/{id}/update', 'update')->name('update');
                    Route::delete('/{id}/destroy', 'destroy')->name('destroy');
                });

            Route::prefix('produk')
                ->as('produk.')
                ->controller(ProdukController::class)
                ->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/kategori/{kategori}', 'byKategori')->name('byKategori');
                    Route::post('/kategori/{kategori}/store', 'store')->name('store');
                    Route::delete('/{produk}/kategori/{kategori}/destroy', 'destroy')->name('destroy');
                    Route::put('/{produk}/kategori/{kategori}/update', 'update')->name('update');
                });
        });
});
