<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\HistoryBarangController;
use App\Http\Controllers\keluarController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('home');
})->middleware('auth');

// routes/web.php
// Route::POST('/logout','Auth\LoginController@logout')->name('logout');

// Route::group(['prefix' => 'admin', 'middleware' => ['auth', IsAdmin::class]], function () {
//     Route::get('/', function () {
//         return view('admin.index');
//     });
//     // untuk Route Backend Lainnya
// });

// Route::group(['prefix' => 'admin', 'middleware' => ['auth', IsAdmin::class]], function () {
//     Route::get('/', function () {
//         return view('admin.index');
//     });
//     // untuk Route Backend Lainnya
// });

Auth::routes();

// Route::group(['prefix' => 'dashboard']);

Route::group(['prefix' => 'admin', 'middleware' => ['auth', IsAdmin::class]], function () {
    Route::resource('user', UserController::class)->middleware(IsAdmin::class);
    Route::resource('masuk', MasukController::class)->middleware(IsAdmin::class);
    Route::get('/history_barang/download-pdf', [HistoryBarangController::class, 'downloadPdf'])->name('history_barang.download_pdf');
    Route::resource('history_barang', HistoryBarangController::class)->middleware(IsAdmin::class);
    Route::resource('keluar', KeluarController::class)->middleware(IsAdmin::class);
    Route::resource('peminjaman', PeminjamanController::class)->middleware(IsAdmin::class);
    // Route::resource('kembali', KembaliController::class)->middleware(IsAdmin::class);
    Route::resource('barang', BarangController::class)->middleware(IsAdmin::class);
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
