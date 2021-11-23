<?php

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

Route::get('/', [\App\Http\Controllers\DataSuratController::class, 'beranda'])->name('beranda');
Route::get('/about', [\App\Http\Controllers\DataSuratController::class, 'about'])->name('about');
Route::get('/arsipkan', [\App\Http\Controllers\DataSuratController::class, 'arsipkan']);
Route::post('/arsipkan/store', [\App\Http\Controllers\DataSuratController::class, 'storeArsip'])->name('storeArsip');
Route::get('/hapus', [\App\Http\Controllers\DataSuratController::class, 'hapus'])->name('hapusArsip');
Route::get('/lihat/{id}', [\App\Http\Controllers\DataSuratController::class, 'lihatArsip'])->name('lihatArsip');
Route::get('/arsipkan-update/{id}', [\App\Http\Controllers\DataSuratController::class, 'arsipkanUpdate'])->name('arsipkanUpdate');
Route::patch('/arsipkan/update/{id}', [\App\Http\Controllers\DataSuratController::class, 'storeArsipUpdate'])->name('storeArsipUpdate');