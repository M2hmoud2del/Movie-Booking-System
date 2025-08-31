<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ScreeningController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AdminController;

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
Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Movies
    Route::resource('movies', MovieController::class);

    // Bookings
    Route::resource('bookings', BookingController::class);

    // Screenings
    Route::resource('screenings', ScreeningController::class);

    // Customers
    Route::resource('customers', CustomerController::class);

    // Admins
    Route::get('admins/logs', [AdminController::class, 'logs'])->name('admins.logs');
    Route::resource('admins', AdminController::class);
    // Payments
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');

    // Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
});


require __DIR__ . '/auth.php';
