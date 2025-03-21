<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TrixController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\CKEditorController;

/**
 * Route untuk halaman utama (Landing Page).
 * 
 * Menggunakan metode `Route::view()` untuk langsung merender tampilan `homepage.blade.php`.
 */
Route::view('/', 'homepage');

/**
 * Route untuk halaman dashboard ADMIN.
 * 
 * Hanya dapat diakses oleh pengguna dengan middleware:
 *   `auth`: Memastikan pengguna sudah login.
 *   `verified`: Memastikan email pengguna sudah diverifikasi.
 *   `admin`: Memastikan pengguna memiliki peran sebagai admin.
 *    Route ini memiliki nama `dashboard` yang dapat digunakan dalam fungsi `route('dashboard')`.
 */
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified', 'admin'])
    ->name('dashboard');

    

/**
 * Route untuk halaman dashboard SUPERADMIN.
 * 
 * Hanya dapat diakses oleh pengguna dengan middleware:
 *   `auth`: Memastikan pengguna sudah login.
 *   `verified`: Memastikan email pengguna sudah diverifikasi.
 *   `superadmin`: Memastikan pengguna memiliki peran sebagai superadmin.
 *    Route ini memiliki nama `superadmin` yang dapat digunakan dalam fungsi `route('superadmin')`.
 */
Route::view('superadmin', 'superadmin')
    ->middleware(['auth', 'superadmin'])
    ->name('superadmin');

/**
 * Route untuk halaman profil pengguna.
 * 
 * Hanya dapat diakses oleh pengguna yang sudah login (`auth` middleware).
 * Route ini memiliki nama `profile` yang dapat digunakan dalam fungsi `route('profile')`.
 */
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

/**
 * Menyertakan file `auth.php` yang berisi rute autentikasi.
 * 
 * Digunakan untuk menangani proses login, register, logout, dan fitur autentikasi lainnya.
 */
require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::resource('/blogs', BlogController::class)->except(['index']);
});

Route::resource('/blogs', BlogController::class)->only(['index']);
Route::get('/blogs/{url}', [BlogController::class, 'show'])->name('blog.show');

Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store')->middleware('auth');



Route::post('/trix/upload', [TrixController::class, 'upload'])->name('trix.upload');