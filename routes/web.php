<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\Admin\AdminState;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrefrenceController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\Admin\AdminDestination;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\RecommnedationController;
use App\Models\Destination;

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

Route::get('/', [RecommnedationController::class, 'recommendations'])->name('home');

Route::middleware('auth')->group(function () {
    Route::patch('/profile/preference', [PrefrenceController::class, 'update'])->name('preference.update');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('hotels', HotelController::class);
    Route::resource('destinations', DestinationController::class);

    // Admin Routes (based on is_admin column)
    Route::middleware(['admin'])->prefix('admin')->group(function () {
        Route::get('/', [AdminDestination::class, 'Dash'])->name('admin.dashboard');
        Route::resource('state', AdminState::class);
        Route::resource('destination', AdminDestination::class);
    });

});

require __DIR__.'/auth.php';
