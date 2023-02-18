<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\MusteriController;
use App\Http\Controllers\SiparisController;


Route::get('/', MusteriController::class)->name('musteriler')->middleware('auth');



Route::post('/musteri-ekle-post', [MusteriController::class, 'Store'])->name('musteri.ekle');
Route::get('/musteri-ekle', [MusteriController::class,'create'])->name('musteri.ekle.page');




Route::get('/musteri_show/{id}', [MusteriController::class, 'show'])->name('musteri_show');
Route::get('/musteri_delete/{id}', [MusteriController::class, 'delete'])->name('musteri_sil');
Route::get('/musteri_edit/{id}', [MusteriController::class, 'edit'])->name('musteri_edit');
Route::post('/musteri_guncelle/{id}', [MusteriController::class, 'update'])->name('musteri.guncelle');
/* Route::post('/search',[MusteriController::class,'search'])->name('musteri_search'); */

Route::get('/siparisler/{musteri_id}', [SiparisController::class, 'index'])->name('siparis.index');

Route::get('/siparis_create/{musteri_id}', [SiparisController::class, 'create'])->name('siparis_create');
Route::post('/siparisler/{musteri_id}', [SiparisController::class, 'store'])->name('siparis_kaydet');
Route::get('/siparis_show/{siparis_id}/{musteri_id}', [SiparisController::class, 'show'])->name('siparis_show');
Route::post('/siparisler/{siparis_id}/{musteri_id}', [SiparisController::class, 'update'])->name('siparis_update');
Route::post('/siparis_delete/{siparis_id}/{musteri_id}',[SiparisController::class,'destroy'])->name('siparis.sil');

Auth::routes([
    'register' => true
]);



//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
