<?php


use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\MusteriController;
use App\Http\Controllers\SiparisController;
use App\Http\Controllers\Auth\RegisterController;


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
    
]);
 
// Route::get('/auth/register', function () {
//     return view('auth.register');
// })->middleware('auth');

// Route::post('/register',[RegisterController::class,'create'])->name('register.user')->middleware('auth');

// Route::get('/reset/password', function () {
//     return view('auth.passwords.reset');
// })->middleware('auth');

// Route::post('/password/update',[ResetPasswordController::class,'update'])->name('update.password')->middleware('auth');

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









