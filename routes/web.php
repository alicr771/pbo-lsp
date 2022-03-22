<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\index;
use App\Http\Controllers\kelolaTransaksi;
use App\Http\Controllers\kelolaUser;
use App\Http\Controllers\tambahUser;
use App\Http\Controllers\loginController;

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
Route::get('/login', [loginController::class, 'index'])->name('login');

Route::post('/login/store', [loginController::class, 'store'])->name('login.custom');

Route::get('/index', [index::class, 'index'])->name('index');

Route::get('/kekolatransaksi', [kelolaTransaksi::class, 'index'])->name('kelolatransaksi');

Route::get('/kelolatransaksi', function () {

    $tbtransaksi = DB::table('tbtransaksi')->get();

    return view('/kelolatransaksi', ['tbtransaksi' => $tbtransaksi]);
});

Route::get('/kelolauser', [kelolaUser::class, 'index'])->name('kelolauser');

// bagian tambah user

Route::get('/tambahuser', [kelolaUser::class, 'create'])->name('tambahuser');

Route::post('/tambahuser/store', [kelolaUser::class, 'store'])->name('storeuser');


// bagian edit user

Route::get('/edituser/edit/{id}', [kelolaUser::class, 'edit'])->name('useredit');

// bagian hapus user
Route::get('/edituser/hapus/{id}', [kelolaUser::class, 'hapus'])->name('hapus');
