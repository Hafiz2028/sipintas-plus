<?php

use App\Http\Controllers\FasilitasController;
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

//auth
Route::view('/login', 'back.pages.login')->name('login');
Route::view('/register', 'back.pages.register')->name('register');

//landing
Route::view('/', 'back.pages.index')->name('home');

//userpages
Route::view('/booking-fasilitas', 'back.pages.bookingFasilitas')->name('booking-fasilitas');

//admin
Route::view('/home-admin', 'back.pages.adminIndex')->name('home-admin');
Route::view('/home-layout', 'back.layout.admin-layout')->name('home-layout');
Route::view('/disposisi-admin', 'back.pages.adminDisposisi')->name('disposisi');

//fasilitas
Route::view('/fasilitas-admin', 'back.pages.adminFasilitas')->name('fasilitas');
Route::resource('fasilitas', FasilitasController::class);

Route::view('/kategori-admin', 'back.pages.adminKategori')->name('kategori');
Route::view('/peminjaman-admin', 'back.pages.adminPeminjaman')->name('peminjaman');
Route::view('/user-admin', 'back.pages.adminUser')->name('user-admin');
Route::view('/detail-disposisi', 'back.pages.detailDisposisi')->name('detail-disposisi');
