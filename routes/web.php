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
    Route::get('kupon/import', 'App\Http\Controllers\Voyager\KuponController@import')->middleware('admin.user')->name('import.kupon');
    Route::post('kupon/import', 'App\Http\Controllers\Voyager\KuponController@simpan')->middleware('admin.user')->name('simpan.kupon');
    Voyager::routes();
});

Route::get('/', [TransaksiController::class, 'index'])->name('index.transaksi');
Route::post('/', [TransaksiController::class, 'store'])->name('store.transaksi');
Route::get('/berhasil/{id}', [TransaksiController::class, 'success'])->name('success.transaksi');
