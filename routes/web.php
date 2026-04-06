<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Added
use App\Http\Controllers\Admin\AcademicSettingsController;
use App\Http\Controllers\Admin\AcademicSessionController;
use App\Http\Controllers\Admin\AcademicClassController;
use App\Http\Controllers\Admin\SectionController;

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

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:admin,staff'])
    ->group(function () {

        Route::prefix('academic')
            ->name('academic.')
            ->group(function () {

                Route::resource('classes', AcademicClassController::class);
            });
    });
    
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:admin,staff'])
    ->group(function () {

        Route::prefix('academic')
            ->name('academic.')
            ->group(function () {

                Route::resource('section', SectionController::class);
            });
    });    

require __DIR__.'/auth.php';
