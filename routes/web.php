<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FilmController;

// Base Route
Route::get('/', function () {
    return view('welcome');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// Redirect setelah login
Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect('/admin/dashboard');
    }
    return redirect('/user/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');
    Route::resource('films', FilmController::class);
});

// User
Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', fn() => view('user.dashboard'))->name('dashboard');
});