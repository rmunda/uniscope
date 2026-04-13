<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Added
use App\Http\Controllers\Admin\AcademicSettingsController;
use App\Http\Controllers\Admin\AcademicSessionController;
use App\Http\Controllers\Admin\AcademicClassController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\RoleController;

// Standard Routes
Route::get('/', fn() => view('welcome'));

Route::get('/dashboard', fn() => view('dashboard'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin & Staff Routes
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:admin,staff'])
    ->group(function () {

        // Academic Sub-group
        Route::prefix('academic')->name('academic.')->group(function () {
            Route::get('settings', AcademicSettingsController::class)->name('settings');
            Route::resource('sessions', AcademicSessionController::class);
            Route::resource('classes', AcademicClassController::class);
            Route::resource('sections', SectionController::class);
            Route::resource('subjects', SubjectController::class); // Fixed controller
        });

        // Admin-only Routes (Nested inside 'admin' prefix)
        Route::middleware('role:admin')->group(function () {
            Route::resource('roles', RoleController::class); // Fixed controller
        });
    });    

require __DIR__.'/auth.php';
