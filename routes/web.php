<?php

use App\Http\Controllers\index;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
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

Route::get('/', function () {
    return view('login');
});

// Bagian Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/store', [LoginController::class, 'store'])->name('login.custom');
Route::get('/logout', [LogoutController::class, 'store'])->name('logout');

// Admin
Route::get('/index', [index::class, 'index'])->name('index');

// Transaksi
Route::get('/kekolatransaksi', [TransaksiController::class, 'index'])->name('kelolatransaksi');

// User
// bagian tambah user
Route::get('/kelolauser', [UserController::class, 'index'])->name('kelolauser');
Route::get('/tambahuser', [UserController::class, 'create'])->name('tambahuser');
Route::post('/tambahuser/store', [UserController::class, 'store'])->name('storeuser');
// bagian edit user
Route::get('/edituser/edit/{id}', [UserController::class, 'edit'])->name('useredit');
Route::put('/edituser/update/{id}', [UserController::class, 'update'])->name('userupdate');
// bagian hapus user
Route::get('/edituser/hapus/{id}', [UserController::class, 'hapus'])->name('hapus');
