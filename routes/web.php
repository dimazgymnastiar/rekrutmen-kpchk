<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\SeleksiController;
use App\Http\Controllers\UserController;
use App\Models\Lowongan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    // Rute untuk admin
    Route::get('/admin', [HomeController::class, 'admin'])->middleware('userAkses:admin');

    // Rute untuk direktur
    Route::get('/direktur', [HomeController::class, 'direktur'])->middleware('userAkses:direktur');

    // Rute lainnya yang tidak memerlukan pengecekan peran spesifik
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [UserController::class, 'userprofile'])->name('profile');
    Route::resource('lowongan', LowonganController::class);
    Route::resource('daftar', DaftarController::class);
    Route::resource('interviews', SeleksiController::class);
    Route::post('/daftar/{id}/accept', [DaftarController::class, 'accept'])->name('daftar.accept');
    Route::get('/riwayat', [DaftarController::class, 'riwayat'])->name('daftar.riwayat');
});
