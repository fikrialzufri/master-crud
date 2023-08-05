<?php

use App\Http\Controllers\AkunKasController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\HutangController;
use App\Http\Controllers\KonversiController;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JenisPembayaranController;
use App\Http\Controllers\JenisTagihanController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\MetodeBayarController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PengirimanBarangController;
use App\Http\Controllers\PiutangController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SuratJalanController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TerimaBarangController;
use App\Http\Controllers\UserController;
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


Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('admin')->group(function () {

        Route::get('/', [HomeController::class, 'index'])->name('home');

        //ACL -- Access Control List
        Route::resource('user', UserController::class);
        Route::resource('role', RoleController::class);
        Route::resource('task', TaskController::class);


        // Lokasi
        Route::resource('provinsi', ProvinsiController::class);
        Route::resource('kota', KotaController::class);

        // Perusahaan

        // ubah profile
        Route::get('/ubahuser', [UserController::class, 'ubah'])->name('user.ubah');
        Route::put('/simpanuser', [UserController::class, 'simpan'])->name('user.simpan');
        Route::put('/save-token', [UserController::class, 'token'])->name('user.token');
        Route::get('/user-notification', [UserController::class, 'notification'])->name('user.notification');
    });
});