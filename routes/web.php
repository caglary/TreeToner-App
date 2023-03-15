<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


use App\Http\Controllers\MusteriController;
use App\Http\Controllers\SiparisController;
use App\Http\Controllers\KasadefteriController;
use App\Http\Controllers\Auth\RegisterController;

//Anasayfa

Route::get('/', [MusteriController::class,'index'])->name('musteriler')->middleware('auth');

//Müşteri 

Route::post('/musteri-ekle-post', [MusteriController::class, 'Store'])->name('musteri.ekle');
Route::get('/musteri-ekle', [MusteriController::class,'create'])->name('musteri.ekle.page');
Route::get('/musteri_show/{id}', [MusteriController::class, 'show'])->name('musteri_show');
Route::get('/musteri_delete/{id}', [MusteriController::class, 'delete'])->name('musteri_sil');
Route::get('/musteri_edit/{id}', [MusteriController::class, 'edit'])->name('musteri_edit');
Route::post('/musteri_guncelle/{id}', [MusteriController::class, 'update'])->name('musteri.guncelle');

//Siparişler
Route::get('/siparisler/{musteri_id}', [SiparisController::class, 'index'])->name('siparis.index');
Route::get('/siparis_create/{musteri_id}', [SiparisController::class, 'create'])->name('siparis_create');
Route::post('/siparisler/{musteri_id}', [SiparisController::class, 'store'])->name('siparis_kaydet');
Route::get('/siparis_show/{siparis_id}/{musteri_id}', [SiparisController::class, 'show'])->name('siparis_show');
Route::post('/siparisler/{siparis_id}/{musteri_id}', [SiparisController::class, 'update'])->name('siparis_update');
Route::post('/siparis_delete/{siparis_id}/{musteri_id}',[SiparisController::class,'destroy'])->name('siparis.sil');
Route::get('/siparis_show/{siparis_id}',[SiparisController::class,'siparis_goster'])->name('siparis.goster');
Auth::routes([
    
]);
 

//User index -> all users
Route::get('/users',[UserController::class,'index'])->name('users.index')->middleware('auth');
//add user
Route::get('/users/create',[UserController::class,'create'])->name('users.create')->middleware('auth');
Route::post('/users',[UserController::class,'store'])->name('users.store')->middleware('auth');
//user show
Route::get('/users/{user}',[UserController::class,'show'])->name('users.show')->middleware('auth');
//user edit form
Route::get('/users/{user}/edit',[UserController::class,'edit'])->name('users.edit')->middleware('auth');
//user update
Route::put('/users/{user}',[UserController::class,'update'])->name('users.update')->middleware('auth');
Route::delete('/users/{id}',[UserController::class,'destroy'])->name('users.destroy')->middleware('auth');

Route::get('/logout',[UserController::class,'logout'])->middleware('auth');


//Kasa defteri işlemleri
Route::get('/kasadefteri',[KasadefteriController::class,'index'])->middleware('auth')->name('kasadefteri.index');
Route::get('/kasadefteri_weekly',[KasadefteriController::class,'index_weekly'])->middleware('auth');
Route::get('/kasadefteri_daily',[KasadefteriController::class,'index_daily'])->middleware('auth');
Route::get('/kasadefteri_monthly',[KasadefteriController::class,'index_monthly'])->middleware('auth');
Route::get('/kasadefteri_yearly',[KasadefteriController::class,'index_yearly'])->middleware('auth');

Route::post('/gelirgider',[KasadefteriController::class,'store'])->middleware('auth');
Route::delete('/kayitsil/{id}',[KasadefteriController::class,'destroy'])->middleware('auth');

//Tahsilatlar
Route::get('/tahsilatlar',[SiparisController::class,'tahsilatlar']);
Route::post('/tahsilatlar/{siparis}/{odeme}/{id}/{odeme_durumu}',[SiparisController::class,'tahsilat']);














