<?php

use App\Http\Controllers\PostKomenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;

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
    return view('form-login');
});

// Route::get('/login', function () {
//     return view('login');
// });

Route::get('/regis', function () {
    return view('regis');
});

// login
Route::post('/masuklogin', [LoginController::class, 'authenticate']);
Route::post('/registrasi', [LoginController::class, 'regis']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/login', [LoginController::class, 'masuk'])->name('login');


Route::get('/home', [LoginController::class, 'index'])->name('home')->middleware('auth');


// album
Route::get('/album', [AlbumController::class, 'index'])->name('album')->middleware('auth');
Route::get('/tambahalbum2', [AlbumController::class, 'album'])->name('album2')->middleware('auth');
Route::get('/poto{id}', [AlbumController::class, 'poto'])->name('poto')->middleware('auth');
Route::get('/hapusalbum/{id}', [AlbumController::class, 'hapus'])->middleware('auth');


Route::post('/tambahpoto3', [AlbumController::class, 'storepoto'])->middleware('auth');
Route::post('/tambahpoto2', [AlbumController::class, 'store'])->middleware('auth');
Route::post('/post', [AlbumController::class, 'create'])->middleware('auth');
Route::post('/editalbum{id}', [AlbumController::class, 'edit'])->middleware('auth');
Route::post('/editfoto{id}', [AlbumController::class, 'update'])->middleware('auth');
Route::get('/hapusfotokeranjang/{id}',[AlbumController::class,'destroy'])->middleware('auth');
Route::get('/cari', [LoginController::class, 'cari'])->middleware('auth');
Route::get('/cariuser', [LoginController::class, 'cariuser'])->middleware('auth');

// profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');
Route::post('/editprofile', [ProfileController::class, 'store'])->middleware('auth');
Route::post('/ubahpassword', [ProfileController::class, 'editpw'])->middleware('auth');

// komen
Route::post('/komen', [PostKomenController::class, 'store'])->middleware('auth');
Route::get('/hapuskomen{id}', [PostKomenController::class, 'destroy'])->middleware('auth');
Route::post('/like', [PostKomenController::class, 'like'])->middleware('auth');

// pengguna lain
Route::get('/liatuser{id}',[ProfileController::class,'liatuser'])->middleware('auth');

// lihatalbumpoto
Route::get('/liatpotoalbum{id}',[ProfileController::class,'liatfotoalbum'])->middleware('auth');
Route::get('/hapusfoto/{id}',[ProfileController::class,'destroy'])->middleware('auth');
Route::post('/editfoto/{id}',[ProfileController::class,'editfoto'])->middleware('auth');

// lihatreport
Route::get('/liatreport',[ProfileController::class,'liatreport'])->middleware('auth');