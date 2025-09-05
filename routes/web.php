<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ScreeningController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminLogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user\HistoryController as UserHistoryController;
use App\Http\Controllers\user\DashboardController as UserDashboardController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\BookController;
use App\Http\Controllers\User\PaymentController as UserPaymentController;


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
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('movies', MovieController::class);
    Route::resource('bookings', BookingController::class);
    Route::resource('screenings', ScreeningController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('admins', AdminController::class);
    Route::get('logs', [AdminLogController::class, 'index'])->name('admins.logs.index');
    Route::get('logs/{id}', [AdminLogController::class, 'show'])->name('admins.logs.show');
    // Payments
    Route::get('/payments', [AdminPaymentController::class, 'index'])->name('payments.index');

    // Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
});




//User Routes
Route::prefix('User')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/movies', [UserController::class, 'movies'])->name('user.movies');
    Route::get('/showtimes', [UserController::class, 'showtimes'])->name('user.showtimes');

    Route::get('/payments', [UserPaymentController::class, 'payments'])->name('user.payments');
   
    Route::get('/booking', [BookController::class, 'booking'])->name('user.booking');
    Route::post('/book/submit', [BookController::class, 'submitBooking'])->name('book.submit');

    Route::get('/history', [UserHistoryController::class, 'history'])->name('user.history');
    
});

require __DIR__ . '/auth.php';
