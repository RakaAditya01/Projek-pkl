<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\WebcamController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\BaranguserController;
use App\Http\Controllers\HistoryController;

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

//history
Route::get('/history', [HistoryController::class, 'index'])->name('history');
Route::delete('/deletehistory/{id}', [PeminjamController::class,'destroy'])->name('deletehistory');

//user
Route::get('/baranguser', [BaranguserController::class, 'index'])->name('baranguser');
Route::put('/baranguser', [BaranguserController::class, 'baranguser'])->name('baranguser');
Route::get('/pinjamuser', [BaranguserController::class,'pinjamuser'])->name('pinjamuser');
Route::post('/insertpinjam', [BaranguserController::class,'store'])->name('insertpinjam');

// Route::post('/namadannim', [BaranguserController::class, 'namadannim'])->name('namadannim');

// barang
Route::get('/barang', [BarangController::class,'index'])->name('barang');
Route::get('/tambahbarang', [BarangController::class,'tambahbarang'])->name('tambahbarang');
Route::post('/insertbarang', [BarangController::class,'store'])->name('insertbarang');
Route::get('/tampilanbarang/{id}', [BarangController::class,'tampilanbarang'])->name('tampilanbarang');
Route::put('/updatebarang/{id}', [BarangController::class,'update'])->name('updatebarang');
Route::get('/deletebarang/{id}', [BarangController::class,'destroy'])->name('deletebarang');
Route::get('/barang/cari',[BarangController::class,'cari'])->name('cari');

// peminjam
Route::get('/peminjaman', [PeminjamController::class,'index'])->name('peminjaman');
Route::get('/tambahpeminjam', [PeminjamController::class,'tambahpeminjam'])->name('tambahpeminjam');
Route::post('/insertpeminjam', [PeminjamController::class,'store'])->name('insertpeminjam');
Route::get('/tampilanpeminjam/{id}', [PeminjamController::class,'tampilanpeminjam'])->name('tampilanpeminjam');
Route::put('/updatepeminjam/{id}', [PeminjamController::class,'update'])->name('updatepeminjam');

Route::get('/deletepeminjaman/{id}', [PeminjamController::class,'destroy'])->name('deletepeminjaman');

Route::get('/peminjam/cari',[PeminjamController::class,'cari'])->name('cari');

// Route::get('/action',[PeminjamController::class,'action'])->name('action');

// Login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');
Route::post('/logout', [LoginController::class, 'logout']);

// webcam
Route::get('webcam', [WebcamController::class, 'index']);
Route::post('webcam', [WebcamController::class, 'store'])->name('webcam.capture');

Route::get('scan', [ScanController::class, 'index'])->name('scan');

// auth
Route::group(['middleware' => ['auth','checkrole:admin']],function () {
    Route::get('admin', function () { return view('admin'); })->middleware('checkRole:admin');
    Route::get('user', function () { return view('user'); })->middleware(['checkRole:user,admin']);
});