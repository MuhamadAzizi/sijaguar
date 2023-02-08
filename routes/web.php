<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JenisRuanganController;
use App\Http\Controllers\RuanganController;

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

Route::get('/', [DashboardController::class, 'index'])->name('index');
Route::resource('ruangan', RuanganController::class);
Route::resource('jenis-ruangan', JenisRuanganController::class)->except(['index', 'show']);
Route::resource('mata-kuliah', MataKuliahController::class);
Route::resource('jadwal', JadwalController::class);
