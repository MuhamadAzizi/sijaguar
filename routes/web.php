<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JadwalUserController;
use App\Http\Controllers\JenisRuanganController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenggunaanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TahunAkademikController;
use App\Http\Controllers\VerifikasiJadwalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewModeController;

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

Route::get('/', [DashboardController::class, 'index'])->name('index')->middleware('auth');
Route::get('login', [LoginController::class, 'index'])->name('login.index');
Route::post('login', [LoginController::class, 'login'])->name('login.login');
Route::get('logout', [LoginController::class, 'logout'])->name('login.logout');
Route::get('view', [ViewModeController::class, 'index'])->name('view.index');
Route::resource('penggunaan', PenggunaanController::class)->except(['show'])->middleware('auth');
Route::resource('ruangan', RuanganController::class)->except(['show'])->middleware('auth');
Route::resource('jenis-ruangan', JenisRuanganController::class)->except(['index', 'show'])->middleware('auth');
Route::resource('mata-kuliah', MataKuliahController::class)->except(['show'])->middleware('auth');
Route::post('tahun-akademik', [TahunAkademikController::class, 'store'])->name('tahun-akademik.store')->middleware('auth');
Route::resource('jadwal', JadwalController::class)->except(['show'])->middleware('auth');
Route::resource('verifikasi-jadwal', VerifikasiJadwalController::class)->only(['index', 'store', 'update'])->middleware('auth');
Route::resource('dosen', DosenController::class)->except(['show'])->middleware('auth');
Route::resource('user', UserController::class)->middleware('auth');
Route::resource('profil', ProfilController::class)->only(['index', 'edit', 'update'])->middleware('auth');
Route::get('register', [RegisterController::class, 'index'])->name('register.index');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');
