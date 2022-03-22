<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Index;
use App\Http\Controllers\kelolaTransaksi;
use App\Http\Controllers\kelolaUser;
use App\Http\Controllers\tambahUser;
use App\Http\Controllers\editUser;
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

Route::get('/index', [index::class, 'index'])->name ('index');

Route::get('/kekolatransaksi', [kelolaTransaksi::class, 'index'])->name ('kelolatransaksi');

Route::get('/kelolatransaksi', function () {

    $tbtransaksi = DB::table('tbtransaksi')->get();

    return view('/kelolatransaksi', ['tbtransaksi' => $tbtransaksi]);
});

Route::get('/kelolatransaksi','kelolaTransksi@index');

Route::get('/kelolauser','kelolaUser@index');

Route::get('/kekolauser', [kelolaUser::class, 'index'])->name ('kelolauser');

// bagian tambah user

Route::get('/tambahuser', [tambahUser::class, 'index'])->name ('tambahuser');

Route::get('/tambahuser/store', [tambahUser::class, 'store'])->name ('storeuser');

Route::post('/tambahuser/store', [tambahUser::class, 'store'])->name ('storeuser');



// bagian edit user

Route::get('/edituser', [editUser::class, 'index'])->name ('edituser');

Route::get('/edituser/edit/{iduser}', [editUser::class, 'edit'])->name ('useredit');

// bagian hapus user
Route::get('/edituser/hapus/{iduser}', [editUser::class, 'hapus'])->name ('hapus');





