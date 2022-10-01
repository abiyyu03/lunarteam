<?php

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

Route::get('/login',[App\Http\Controllers\AuthController::class,'login']);
Route::post('/login',[App\Http\Controllers\AuthController::class,'loginProcess'])->name('login');
Route::get('/logout',[App\Http\Controllers\AuthController::class,'logout'])->name('logout');

Route::middleware('isAuthenticated')->group(function(){
    //dashboard
    Route::get('/',[App\Http\Controllers\DashboardController::class,'index']);

    //Ganti Pelumas
    Route::get('/ganti_pelumas',[App\Http\Controllers\GantiPelumasController::class,'index']);
    Route::get('/ganti_pelumas/create',[App\Http\Controllers\GantiPelumasController::class,'create']);
    Route::get('/ganti_pelumas/edit/{id}',[App\Http\Controllers\GantiPelumasController::class,'edit']);
    Route::post('/ganti_pelumas/update/{id}',[App\Http\Controllers\GantiPelumasController::class,'update'])->name('ganti_pelumas.update');
    Route::post('/ganti_pelumas/store',[App\Http\Controllers\GantiPelumasController::class,'store'])->name('ganti_pelumas.store');
    Route::get('/ganti_pelumas/delete/{id}',[App\Http\Controllers\GantiPelumasController::class,'delete']);

    //Petugas
    Route::get('/petugas',[App\Http\Controllers\PetugasController::class,'index']);
    Route::get('/petugas/create',[App\Http\Controllers\PetugasController::class,'create']);
    Route::get('/petugas/edit/{id}',[App\Http\Controllers\PetugasController::class,'edit']);
    Route::post('/petugas/update/{id}',[App\Http\Controllers\PetugasController::class,'update'])->name('petugas.update');
    Route::post('/petugas/store',[App\Http\Controllers\PetugasController::class,'store'])->name('petugas.store');

    //Cleaning
    Route::get('/cleaning',[App\Http\Controllers\CleaningController::class,'index']);
    Route::get('/cleaning/create',[App\Http\Controllers\CleaningController::class,'create']);
    Route::get('/cleaning/delete/{id}',[App\Http\Controllers\CleaningController::class,'delete']);
    Route::get('/cleaning/edit/{id}',[App\Http\Controllers\CleaningController::class,'edit']);
    Route::post('/cleaning/update/{id}',[App\Http\Controllers\CleaningController::class,'update'])->name('cleaning.update');
    Route::post('/cleaning/store',[App\Http\Controllers\CleaningController::class,'store'])->name('cleaning.store');

    //Tightening
    Route::get('/tightening',[App\Http\Controllers\TighteningController::class,'index']);
    Route::get('/tightening/create',[App\Http\Controllers\TighteningController::class,'create']);
    Route::get('/tightening/delete/{id}',[App\Http\Controllers\TighteningController::class,'delete']);
    Route::get('/tightening/edit/{id}',[App\Http\Controllers\TighteningController::class,'edit']);
    Route::post('/tightening/update/{id}',[App\Http\Controllers\TighteningController::class,'update'])->name('tightening.update');
    Route::post('/tightening/store',[App\Http\Controllers\TighteningController::class,'store'])->name('tightening.store');

    //pelumas
    Route::get('/pelumas',[App\Http\Controllers\PelumasController::class,'index']);
    Route::get('/pelumas/create',[App\Http\Controllers\PelumasController::class,'create']);
    Route::get('/pelumas/delete/{id}',[App\Http\Controllers\PelumasController::class,'delete']);
    Route::get('/pelumas/edit/{id}',[App\Http\Controllers\PelumasController::class,'edit']);
    Route::post('/pelumas/update/{id}',[App\Http\Controllers\PelumasController::class,'update'])->name('pelumas.update');
    Route::post('/pelumas/store',[App\Http\Controllers\PelumasController::class,'store'])->name('pelumas.store');
});