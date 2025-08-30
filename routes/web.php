<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/movies', [AdminController::class, 'movies'])->name('admin.movies');
    Route::get('/bookings', [AdminController::class, 'bookings'])->name('admin.bookings');
    Route::get('/screenings', [AdminController::class, 'screenings'])->name('admin.screenings');
    Route::get('/customers', [AdminController::class, 'customers'])->name('admin.customers');
    Route::get('/payments', [AdminController::class, 'payments'])->name('admin.payments');
    Route::get('/reports', [AdminController::class, 'reports'])->name('admin.reports');
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
});


require __DIR__ . '/auth.php';
