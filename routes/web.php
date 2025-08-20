<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\TutorApplicationController;
use App\Http\Controllers\Admin\TutorManagementController;
use App\Http\Controllers\Tutor\ProfileController as TutorProfileController;
use App\Http\Controllers\TutorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tutors', [TutorController::class, 'index'])->name('tutors.index');

Route::get('/tutors/{user}', [TutorController::class, 'show'])->name('tutors.show');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::resource('subjects', SubjectController::class);
        Route::get('tutors', [TutorManagementController::class, 'index'])->name('tutors.index');
        Route::patch('tutors/{tutorProfile}/verify', [TutorManagementController::class, 'verify'])->name('tutors.verify');
    });

    // Tutor Application Routes
    Route::get('/tutor/apply', [TutorApplicationController::class, 'create'])->name('tutor.apply');
    Route::post('/tutor/apply', [TutorApplicationController::class, 'store'])->name('tutor.store');

    // TUTOR ROUTES
    Route::middleware(['tutor'])->prefix('tutor')->name('tutor.')->group(function () {
        Route::get('profile', [TutorProfileController::class, 'edit'])->name('profile.edit');
        Route::put('profile', [TutorProfileController::class, 'update'])->name('profile.update');
    });
});

require __DIR__.'/auth.php';
