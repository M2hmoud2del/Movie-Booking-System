<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ScreeningController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminLogController;
use App\Http\Controllers\user\BookController;
use App\Http\Controllers\user\DashboardController as UserDashboardController;
use App\Http\Controllers\user\UserController;

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
Route::prefix('admin')->middleware(['auth', 'verified', IsAdmin::class])->name('admin.')->group(function () {
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
    Route::resource('admins', AdminController::class);

    //Admin logs
    Route::get('logs', [AdminLogController::class, 'index'])->name('admins.logs.index');
    Route::get('logs/{id}', [AdminLogController::class, 'show'])->name('admins.logs.show');
    // Payments
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::patch('/payments/{id}/update-status', [PaymentController::class, 'updateStatus'])->name('payments.updateStatus');

    // Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
});




//User Routes
Route::prefix('User')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/movies', [UserController::class, 'movies'])->name('user.movies');
    Route::get('/showtimes', [UserController::class, 'showtimes'])->name('user.showtimes');
    Route::get('/payments', [UserController::class, 'payments'])->name('user.payments');
    Route::get('/booking', [BookController::class, 'booking'])->name('user.booking');
    Route::post('/book/submit', [BookController::class, 'submitBooking'])->name('book.submit');

    Route::get('/history', [UserController::class, 'history'])->name('user.history');
});


require __DIR__ . '/auth.php';
