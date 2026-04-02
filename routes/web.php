<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
//
use App\Http\Controllers\Admin\AcademicSettingsController;
use App\Http\Controllers\Admin\AcademicSessionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/academic/settings',  AcademicSettingsController::class)
    ->middleware(['auth', 'role:admin,staff'])
    ->name('admin.academic.settings');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:admin,staff'])
    ->group(function () {

        Route::prefix('academic')
            ->name('academic.')
            ->group(function () {

                Route::resource('sessions', AcademicSessionController::class);
            });
    });

require __DIR__.'/auth.php';
