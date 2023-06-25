<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
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


Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerUser']);

Route::group(['middleware' => 'auth'],function(){

    Route::get('/logout', [AuthController::class, 'logout']);

    // Route::get('/', [DashboardController::class]);

});
Route::group(['prefix' => 'dosen', 'middleware' => 'auth:dosen'], function(){
    Route::get('/', [DosenController::class, 'index'])->name('dosen');
    Route::get('/bimbingan', [DosenController::class, 'bimbingan']);
    Route::get('/bimbingan/detail/{id}', [DosenController::class, 'detail']);
});

Route::group(['prefix' => 'mahasiswa', 'middleware' => 'auth:mahasiswa'], function(){
    Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswa');
    Route::post('/sk', [MahasiswaController::class, '']);
});
