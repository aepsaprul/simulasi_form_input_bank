<?php

use App\Http\Controllers\NasabahController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function() {
    return redirect()->route('login');
});

Auth::routes([
    'register' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    // siswa
    Route::get('siswa', [SiswaController::class, 'index'])->name('siswa');
    Route::get('siswa/create',[SiswaController::class, 'create'])->name('siswa.create');
    Route::post('siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::post('siswa/update', [SiswaController::class, 'update'])->name('siswa.update');
    Route::post('siswa/delete', [SiswaController::class, 'delete'])->name('siswa.delete');

    // nasabah
    Route::get('nasabah', [NasabahController::class, 'index'])->name('nasabah');
    Route::get('nasabah/create',[NasabahController::class, 'create'])->name('nasabah.create');
    Route::post('nasabah/store', [NasabahController::class, 'store'])->name('nasabah.store');
    Route::get('nasabah/{id}/edit', [NasabahController::class, 'edit'])->name('nasabah.edit');
    Route::post('nasabah/update', [NasabahController::class, 'update'])->name('nasabah.update');
    Route::post('nasabah/delete', [NasabahController::class, 'delete'])->name('nasabah.delete');
});
