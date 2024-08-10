<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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


//landing
Route::view('/', 'back.pages.index')->name('landing');
Route::get('/home', function () {
    return redirect('/admin/home');
});


Route::middleware(['guest'])->group(function () {
    //auth
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login_handler', [AuthController::class, 'loginHandler'])->name('login-handler');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/home', 'home')->name('home');
        });
    });
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'role:kabag'])->group(function () {

});










Route::view('/register', 'back.pages.register')->name('register');

//userpages
Route::view('/booking-fasilitas', 'back.pages.bookingFasilitas')->name('booking-fasilitas');








//admin
Route::view('/home-layout', 'back.layout.admin-layout')->name('home-layout');
Route::view('/disposisi-admin', 'back.pages.adminDisposisi')->name('disposisi');

//fasilitas
Route::view('/fasilitas-admin', 'back.pages.adminFasilitas')->name('fasilitas');
Route::resource('fasilitas', FasilitasController::class);

Route::view('/kategori-admin', 'back.pages.adminKategori')->name('kategori');
Route::view('/peminjaman-admin', 'back.pages.adminPeminjaman')->name('peminjaman');
Route::view('/user-admin', 'back.pages.adminUser')->name('user-admin');
Route::view('/detail-disposisi', 'back.pages.detailDisposisi')->name('detail-disposisi');
