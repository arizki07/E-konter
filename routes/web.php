<?php

use App\Http\Controllers\Admin\BrilinkController;
use App\Http\Controllers\Admin\KartuController;
use App\Http\Controllers\Admin\PelangganController;
use App\Http\Controllers\Admin\TransPulsaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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

Route::middleware('auth')->group(function () {

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
    });
});
