<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\FasilitasController;
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
});

Route::get('/home', function () {
    return redirect('/admin/home');
});
Route::middleware(['auth', 'userAkses:admin', 'PreventBackHistory'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/home', 'home')->name('home');
        });
        Route::get('/homepage', [LandingController::class, 'landing'])->name('homepage');
        Route::get('/api/home', [AdminController::class, 'getHomes'])->name('home.api');

        Route::resource('disposisi', DisposisiController::class);
        Route::get('/api/disposisi', [DisposisiController::class, 'getDisposisi'])->name('disposisi.api');

        Route::resource('rent', RentController::class);
        Route::post('/upload-surat', [RentController::class, 'uploadSurat']);
        Route::post('/rent-update/{rent}', [RentController::class, 'updateRent'])->name('rent-update');
        Route::get('/api/rent', [RentController::class, 'getRents'])->name('rent.api');

        Route::resource('user', UserController::class);
        Route::get('/api/user', [UserController::class, 'getUsers'])->name('user.api');

        Route::resource('fasilitas', FasilitasController::class);
        Route::get('/api/fasilitas', [FasilitasController::class, 'getFacilities'])->name('fasilitas.api');
        Route::post('/fasilitas-update/{fasilitas}', [FasilitasController::class, 'updateFacility'])->name('fasilitas-update');
        Route::delete('/fasilitas-image/delete/{fasilityImage}',[FasilitasController::class, 'deleteImage'])->name('fasilitas-delete-image');

        Route::resource('tipe-fasilitas', TipeFasilitasController::class);
        Route::get('/api/tipe-fasilitas', [TipeFasilitasController::class, 'getFacilityTypes'])->name('tipe-fasilitas.api');
    });
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'userAkses:peminjam', 'PreventBackHistory'])->group(function () {
    Route::get('/homepage', [LandingController::class, 'landing'])->name('homepage');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
