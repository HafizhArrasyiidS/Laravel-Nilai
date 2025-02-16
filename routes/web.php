<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('/siswa', SiswaController::class);
Route::resource('/guru', GuruController::class);
Route::resource('/mapel', MapelController::class);
Route::resource('/pengajar', PengajarController::class)->except('create');
Route::resource('/nilai', NilaiController::class);

Route::get('/pengajar/create/{mapel}', [PengajarController::class, 'create'])->name('pengajar.create');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
