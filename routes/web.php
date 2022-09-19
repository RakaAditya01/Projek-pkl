<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

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
});


// barang
Route::get('/barang', [BarangController::class,'index'])->name('barang');

Route::get('/tambahbarang', [BarangController::class,'tambahbarang'])->name('tambahbarang');

Route::post('/insertbarang', [BarangController::class,'store'])->name('insertbarang');

Route::get('/tampilanbarang/{id}', [BarangController::class,'tampilanbarang'])->name('tampilanbarang');

Route::put('/updatebarang/{id}', [BarangController::class,'update'])->name('updatebarang');

Route::delete('/deletebarang/{id}', [BarangController::class,'destroy'])->name('deletebarang');