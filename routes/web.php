<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\KabagController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\TipeFasilitasController;
use App\Http\Controllers\UserController;
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


Route::get('/detail-booking/{facility}', [LandingController::class, 'detailBooking'])->name('detail-booking');
Route::post('/book-facility', [LandingController::class, 'bookFacility'])->name('book-facility');




Route::middleware(['guest', 'PreventBackHistory'])->group(function () {
    Route::get('/', [LandingController::class, 'landing'])->name('landing');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/admin/register', [AuthController::class, 'adminRegister'])->name('admin-register');
    Route::post('/create-user', [AuthController::class, 'createUser'])->name('create-user');
    Route::post('/login_handler', [AuthController::class, 'loginHandler'])->name('login-handler');

    // Route::get('/riwayat-peminjaman', [LandingController::class, 'history'])->name('history');
});

Route::get('/home', function () {
    return redirect('/admin/home');
});
Route::middleware(['auth', 'userAkses:admin', 'PreventBackHistory'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        //profile
        Route::get('/profile', [AdminController::class, 'viewProfile'])->name('profile');
        Route::post('/change-profile-picture', [AdminController::class, 'changeProfilePicture'])->name('change-profile-picture');
        Route::post('/update-profile', [AdminController::class, 'updateProfile'])->name('update-profile');
        //dashboard
        Route::get('/home', [AdminController::class, 'home'])->name('home');
        //disposisi
        Route::resource('disposisi', DisposisiController::class);
        //peminjaman
        Route::resource('rent', RentController::class);
        Route::post('/upload-surat', [RentController::class, 'uploadSurat']);
        Route::post('/rent-update/{rent}', [RentController::class, 'updateRent'])->name('rent-update');
        //user
        Route::resource('user', UserController::class);
        //fasilitas
        Route::resource('fasilitas', FasilitasController::class);
        Route::post('/fasilitas-update/{fasilitas}', [FasilitasController::class, 'updateFacility'])->name('fasilitas-update');
        Route::delete('/fasilitas-image/delete/{fasilityImage}', [FasilitasController::class, 'deleteImage'])->name('fasilitas-delete-image');
        //kategori
        Route::resource('tipe-fasilitas', TipeFasilitasController::class);
    });
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'userAkses:peminjam', 'PreventBackHistory'])->group(function () {
    Route::get('/homepage', [LandingController::class, 'landing'])->name('homepage');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/riwayat-peminjaman', [LandingController::class, 'history'])->name('history');
    Route::get('/print-surat/{rent}', [LandingController::class, 'printSurat'])->name('printSurat');
    Route::put('/update-peminjaman/{rent}', [LandingController::class, 'updatePeminjaman'])->name('update-peminjaman');
    Route::delete('/delete-rent/{rent}', [LandingController::class, 'destroy'])->name('delete-rent');
});
Route::middleware(['auth', 'userAkses:kabag', 'PreventBackHistory'])->group(function () {
    Route::prefix('kabag')->name('kabag.')->group(function () {
        //profile
        Route::get('/profile', [AdminController::class, 'viewProfile'])->name('profile');
        Route::post('/change-profile-picture', [AdminController::class, 'changeProfilePicture'])->name('change-profile-picture');
        Route::post('/update-profile', [AdminController::class, 'updateProfile'])->name('update-profile');
        //homepage
        Route::get('/home', [KabagController::class, 'home'])->name('home');
        //disposisi
        Route::resource('disposisi', DisposisiController::class);
    });
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


//api
Route::get('/admin/api/home', [AdminController::class, 'getHomes'])->name('admin.home.api');
Route::get('/admin/api/disposisi', [DisposisiController::class, 'getDisposisi'])->name('admin.disposisi.api');
Route::get('/admin/api/rent', [RentController::class, 'getRents'])->name('admin.rent.api');

Route::get('/download', [LandingController::class, 'downloadFile'])->name('file.download');
Route::get('/search/filter', [LandingController::class, 'filter'])->name('search.filter');

Route::get('/api/rent/{rent}', [LandingController::class, 'getRentById'])->name('api.rent');


Route::get('/admin/api/user', [UserController::class, 'getUsers'])->name('admin.user.api');
Route::get('/admin/api/fasilitas', [FasilitasController::class, 'getFacilities'])->name('admin.fasilitas.api');
Route::get('/admin/api/tipe-fasilitas', [TipeFasilitasController::class, 'getFacilityTypes'])->name('admin.tipe-fasilitas.api');
