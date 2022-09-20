<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PeminjamController;

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
    return view('login.login');
})->middleware('auth');

//home
Route::get('/home', [HomeController::class, 'index'])->name('home');


// barang
Route::get('/barang', [BarangController::class,'index'])->name('barang');

Route::get('/tambahbarang', [BarangController::class,'tambahbarang'])->name('tambahbarang');

Route::post('/insertbarang', [BarangController::class,'store'])->name('insertbarang');

Route::get('/tampilanbarang/{id}', [BarangController::class,'tampilanbarang'])->name('tampilanbarang');

Route::put('/updatebarang/{id}', [BarangController::class,'update'])->name('updatebarang');

Route::delete('/deletebarang/{id}', [BarangController::class,'destroy'])->name('deletebarang');

// peminjam
Route::get('/peminjaman', [PeminjamController::class,'index'])->name('peminjaman');

Route::get('/tambahpeminjam', [PeminjamController::class,'tambahpeminjam'])->name('tambahpeminjam');

Route::post('/insertpeminjam', [PeminjamController::class,'store'])->name('insertpeminjam');

Route::get('/tampilanpeminjam/{id}', [PeminjamController::class,'tampilanpeminjam'])->name('tampilanpeminjam');

Route::put('/updatepeminjam/{id}', [PeminjamController::class,'update'])->name('updatepeminjam');

Route::delete('/deletepeminjaman/{id}', [PeminjamController::class,'destroy'])->name('deletepeminjaman');

// Login
Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::get('/register', [LoginController::class, 'register'])->name('register');

Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');

Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');

Route::post('/logout', [LoginController::class, 'logout']);

// auth

Route::group(['middleware' => ['auth','checkrole:admin']],function () {
    Route::get('admin', function () { return view('admin'); })->middleware('checkRole:admin');
    Route::get('user', function () { return view('user'); })->middleware(['checkRole:user,admin']);
});