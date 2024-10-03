<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckAdmin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Start in:
Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Login:
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Funcional Site
Route::middleware('auth')->group(function () {

    // User Access:
    Route::get('/example', function() {
        return view('example');
    })->name('example.link');

    // Admin Access:
    Route::middleware(CheckAdmin::class)->group( function() {
        Route::get('/admin', function() {
            return view('forbidden');
        })->name('adminsla');
    });

    Route::fallback(function () {
        return view('errors.404');
    });
});

// Route::resources([

// ])

require __DIR__ . '/auth.php';
