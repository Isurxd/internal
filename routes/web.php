<?php

// use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HistoryBarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\keluarController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MasukController;
// use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\UserController;
// use App\Models\Pengembalian;
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

Route::get('/', [HomeController::class, 'index'])->middleware('auth');

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

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::resource('user', UserController::class);
    Route::resource('masuk', MasukController::class);
    Route::get('/history_barang/download-pdf', [HistoryBarangController::class, 'downloadPdf'])->name('history_barang.download_pdf');
    Route::resource('history_barang', HistoryBarangController::class);
    Route::resource('keluar', KeluarController::class);
    // Route::resource('peminjaman', PeminjamanController::class);
    // Route::resource('kembali', KembaliController::class)->middleware(IsAdmin::class);
    Route::resource('barang', BarangController::class);
    Route::resource('laporan', LaporanController::class);

    Route::post('laporan', [LaporanController::class, 'report'])->name('report');
    Route::post('print-laporan', [LaporanController::class, 'printReport'])->name('printReport');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
