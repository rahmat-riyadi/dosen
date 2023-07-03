<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\MahasiswaController;
use App\Models\Admin;
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


Route::get('/', [AuthController::class, 'login'])->middleware('guest');
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerUser']);

Route::group(['middleware' => 'auth'],function(){
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::group(['prefix' => 'dosen', 'middleware' => 'auth:dosen'], function(){
    Route::get('/', [DosenController::class, 'index'])->name('dosen');
    Route::get('/bimbingan', [DosenController::class, 'bimbingan']);
    Route::get('/bimbingan/detail/{id}', [DosenController::class, 'detail']);
});

Route::group(['prefix' => 'mahasiswa', 'middleware' => 'auth:mahasiswa'], function(){
    Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswa');
    Route::get('/jadwal/{id}/{status}', [JadwalController::class, 'changeScheduleStatus']);
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function(){
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('/dosen/{id}', [AdminController::class, 'mahasiswaBimbingan']);
    Route::get('/dosen/{dosen_id}/mahasiswa/{mahasiswa_id}', [AdminController::class, 'detailMahasiswa']);
    Route::get('/change/{id}', [AdminController::class, 'accAccount']);
});
