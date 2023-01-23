<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KayitController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MusteriController;
use App\Http\Controllers\WelcomeController;

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



Route::get('/', MusteriController::class)->name('musteriler');



Route::post('/musteriekle', [MusteriController::class,'musteriekle'])->name('musteri_add');
Route::get('/ekle', function(){
    return view('treetoner._musteriAdd');
})->name('musteri_add_get');




Route::get('/musteri_show/{id}', [MusteriController::class, 'show'])->name('musteri_show');
Route::get('/musteri_delete/{id}',[MusteriController::class,'delete'])->name('musteri_sil');
Route::get('/musteri_edit/{id}',[MusteriController::class,'edit'])->name('musteri_edit');
Route::post('/musteri_update/{id}',[MusteriController::class,'update'])->name('musteri_update');
Route::post('/search',[MusteriController::class,'search'])->name('musteri_search');

Route::get('/siparisler/{musteri_id}',[KayitController::class,'index'])->name('siparis_index');

Route::get('/siparis_create/{musteri_id}',[KayitController::class,'create'])->name('siparis_create');
Route::post('/siparisler/{musteri_id}', [KayitController::class,'store'])->name('siparis_kaydet');
Route::get('/siparis_show/{siparis_id}/{musteri_id}',[KayitController::class,'show'])->name('siparis_show');
Route::post('/siparisler/{siparis_id}/{musteri_id}',[KayitController::class,'update'])->name('siparis_update');















