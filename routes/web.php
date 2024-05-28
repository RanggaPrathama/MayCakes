<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CakesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\PembayaranController;
use Illuminate\Support\Facades\Route;



Route::get('/',[AuthController::class,'login'])->name('login');
Route::post('/',[AuthController::class,'loginPost'])->name('loginPost');
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'registerPost'])->name('registerPost');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/homeUser',[HomeController::class,'homeUser'])->name('homeUser');

/* ============== ADMIN ROUTES ============= */

/* Route Cakes*/
Route::get('/cake',[CakesController::class,'index'])->name('cake.index');
Route::get('/cakes/create',[CakesController::class,'create'])->name('cake.create');
Route::post('/cakes/store',[CakesController::class,'store'])->name('cake.store');
Route::get('/cakes/{id}/edit',[CakesController::class,'edit'])->name('cake.edit');
Route::put('/cakes/{id}/update',[CakesController::class,'update'])->name('cake.update');
Route::delete('/cakes/{id}/delete',[CakesController::class,'destroy'])->name('cake.delete');
Route::get('/cake/image/{id}',[CakesController::class,'showImage'])->name('cake.image');

/*Route Payment */
Route::get('/payment',[PaymentsController::class,'index'])->name('payment.index');
Route::get('/payment/create',[PaymentsController::class,'create'])->name('payment.create');
Route::post('/payment/store',[PaymentsController::class,'store'])->name('payment.store');
Route::get('/payment/edit/{id}',[PaymentsController::class,'edit'])->name('payment.edit');
Route::put('/payment/update/{id}',[PaymentsController::class,'update'])->name('payment.update');
Route::delete('/payment/delete/{id}',[PaymentsController::class,'destroy'])->name('payment.delete');
Route::get('/payment/image/{id}',[PaymentsController::class,'imagePayment'])->name('payment.image');

/* Route LAPORAN TRANSAKSI*/
Route::get('/laporanTransaksi',[PembayaranController::class,'laporanTransaksi'])->name('laporanTransaksi');
