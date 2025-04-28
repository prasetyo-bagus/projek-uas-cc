<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrixController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\DynamicAssetController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestimonialController;
use App\Models\DynamicAsset;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;

/**
 * Route untuk halaman utama (Landing Page).
 *
 * Menggunakan metode `Route::view()` untuk langsung merender tampilan `homepage.blade.php`.
 */
// Route::get('/', [BlogController::class, 'homepage'])->name('homepage');
// Route::get('/', [LandingController::class, 'index'])->name('homepage');
Route::get('/', [HomeController::class, 'index'])->name('homepage');

/**
 * Route untuk halaman galeri
 */
Route::get('/galeri', [HomeController::class, 'gallery'])->name('gallery');

/**
 * Route untuk halaman fasilitas
 */
Route::get('/fasilitas', [HomeController::class, 'facilities'])->name('facilities');

/**
 * Route untuk halaman paket wisata
 */
Route::get('/paket-wisata', [HomeController::class, 'packets'])->name('packets');

/**
 * Route untuk halaman dashboard ADMIN.
 *
 * Hanya dapat diakses oleh pengguna dengan middleware:
 *   `auth`: Memastikan pengguna sudah login.
 *   `verified`: Memastikan email pengguna sudah diverifikasi.
 *   `admin`: Memastikan pengguna memiliki peran sebagai admin.
 *    Route ini memiliki nama `dashboard` yang dapat digunakan dalam fungsi `route('dashboard')`.
 */
Route::get('dashboard', [DashboardController::class, 'adminDashboard'])
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



Route::get('superadmin', [DashboardController::class, 'superadminDashboard'])

->middleware(['auth', 'verified', 'superadmin'])
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
/**
 * Rute untuk manajemen Blog
 */
Route::middleware(['auth'])->group(function () {
    Route::resource('/blogs', BlogController::class)->except(['index', 'show']);
    Route::resource('/dynamic-assets', DynamicAssetController::class);
    Route::patch('/dynamic-assets/{id}/toggle-status', [DynamicAssetController::class, 'toggleStatus'])->name('dynamic-assets.toggle-status');
    // Route::get('/dynamic-assets/create/{type}', [DynamicAssetController::class, 'create'])->name('dynamic-assets.create');

    // Routes untuk admin testimonial
    Route::get('/admin/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
    Route::patch('/admin/testimonials/{testimonial}/status', [TestimonialController::class, 'updateStatus'])->name('testimonials.update.status');
    Route::delete('/admin/testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

/**
 * Route untuk menampilkan daftar blog (tanpa autentikasi)
 */
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');

/**
 * Route untuk menampilkan detail blog
 */
Route::get('/blogs/{url}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/blog/{url}', [BlogController::class, 'show'])->name('blog.show');

/**
 * Route untuk menyimpan blog (hanya bisa diakses jika login)
 */
Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store')->middleware('auth');

/**
 * Route untuk upload gambar di Trix Editor
 */
Route::post('/trix/upload', [TrixController::class, 'upload'])->name('trix.upload');

// Routes untuk testimonial
Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
Route::get('/api/testimonials', [TestimonialController::class, 'getApprovedTestimonials'])->name('api.testimonials');
Route::get('/review', [TestimonialController::class, 'showAll'])->name('testimonials.all');

/**
 * Menyertakan file auth.php yang berisi route autentikasi
 */
require __DIR__ . '/auth.php';

Route::get('/ads', [AdController::class, 'create']);
Route::post('/ads', [AdController::class, 'store'])->name('ads.store');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('blogs', BlogController::class);
    Route::resource('dynamic-assets', DynamicAssetController::class);
    // Route::resource('ads', AdController::class);
});


Route::post('/logout', function () {
    Auth::guard('web')->logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/'); // arahkan ke halaman utama setelah logout
})->name('logout');
