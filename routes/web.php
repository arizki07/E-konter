<?php

use App\Http\Controllers\Admin\BarangController as AdminBarangController;
use App\Http\Controllers\Admin\BrilinkController;
use App\Http\Controllers\Admin\KartuController;
use App\Http\Controllers\Admin\KategoriController as AdminKategoriController;
use App\Http\Controllers\Admin\PelangganController;
use App\Http\Controllers\Admin\TransPulsaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\Datatables\RekapList;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RekapController;
use App\Models\PelangganModel;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.login');
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'authenticate')->name('auth.post');
    Route::get('/logout', 'logout');
});

Route::resource('getRekap', RekapList::class);

Route::middleware('auth')->group(function () {

    Route::get('/loading', function () {
        return view('pages.loading');
    })->name('loading');

    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
    });

    Route::controller(PelangganController::class)->group(function () {
        Route::get('/pelanggan', 'index');
        Route::post('/store/pelanggan', 'store')->name('store.pelanggan');
        Route::put('/update/pelanggan/{id}', 'update')->name('update.pelanggan');
        Route::delete('/destroy/pelanggan/{id}', 'destroy');
    });

    Route::controller(KartuController::class)->group(function () {
        Route::get('/harga', 'index');
        Route::post('/harga/store', 'store')->name('store.harga');
        Route::put('/harga/update/{id}', 'update')->name('update.harga');
        Route::delete('/harga/destroy/{id}', 'destroy');
    });

    Route::controller(TransPulsaController::class)->group(function () {
        Route::get('/transPulsa', 'index');
        Route::post('/store/trans', 'store')->name('store.trans');
        Route::put('/update/trans/{id}', 'update')->name('update.trans');
        Route::delete('/destroy/trans/{id}', 'destroy');
        Route::get('/trans/print/{id}', 'print')->name('print.trans');
    });

    Route::controller(BrilinkController::class)->group(function () {
        Route::get('/brilink', 'index');
        Route::post('/brilink/store', 'store')->name('post.brilink');
        Route::get('/brilink/print/{id}', 'printBrilink')->name('print.brilink');
    });

    Route::controller(AdminKategoriController::class)->group(function () {
        Route::get('/kategori', 'index');
        Route::post('/store/kategori', 'store')->name('store.kategori');
        Route::put('/update/kategori/{id}', 'update')->name('update.kategori');
        Route::delete('/destroy/kategori/{id}', 'destroy');
        // Route::get('/brilink/print/{id}', 'printBrilink')->name('print.brilink');
    });

    Route::controller(AdminBarangController::class)->group(function () {
        Route::get('/barang', 'index');
        Route::post('/store/barang', 'store')->name('store.barang');
        Route::put('/update/barang/{id}', 'update')->name('update.barang');
        Route::delete('/destroy/barang/{id}', 'destroy');
        // Route::get('/brilink/print/{id}', 'printBrilink')->name('print.brilink');
    });

    Route::controller(RekapController::class)->group(function () {
        Route::get('rekap', 'index');
        Route::get('search', 'search')->name('rekap.search');
        Route::post('store/rekap', 'store')->name('store.rekap');
        Route::post('update/rekap/{id}', 'update')->name('update.rekap');
        Route::delete('/rekap/delete/{id}', 'destroy')->name('rekap.destroy');
    });
});
