<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['prefix' => 'admin'], function () {
    //kupon import
    Route::get('kupon/import', 'App\Http\Controllers\Voyager\KuponController@import')->middleware('admin.user')->name('import.kupon');
    Route::post('kupon/import', 'App\Http\Controllers\Voyager\KuponController@simpan')->middleware('admin.user')->name('simpan.kupon');
    //Format data
    Route::get('format', 'App\Http\Controllers\Voyager\KuponController@format')->middleware('admin.user')->name('format.kupon');
    Route::post('format', 'App\Http\Controllers\Voyager\KuponController@hapus')->middleware('admin.user')->name('hapus.kupon');
    //export transaksi
    Route::get('transaksi/data', 'App\Http\Controllers\Voyager\TransaksiController@export')->middleware('admin.user')->name('data.transaksi');
    Route::post('transaksi/data/export', 'App\Http\Controllers\Voyager\TransaksiController@download')->middleware('admin.user')->name('download.transaksi');
    Route::get('transaksi/data/export', 'App\Http\Controllers\Voyager\TransaksiController@download')->middleware('admin.user')->name('export.transaksi');
    Voyager::routes();
});

Route::get('/', [TransaksiController::class, 'index'])->name('index.transaksi');
Route::post('/', [TransaksiController::class, 'store'])->name('store.transaksi');
Route::get('/berhasil/{id}', [TransaksiController::class, 'success'])->name('success.transaksi');
