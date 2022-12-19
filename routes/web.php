<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ExamController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class, 'index']);

Route::middleware(['auth', 'verified'])->group(function () {

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    Route::controller(StudentController::class)->group(function () {
        Route::get('/students', 'index')->name('students.index');
        Route::get('/students/create', 'create')->name('students.create');
    });


    Route::get('exams', [ExamController::class, 'index'])->name('exams');

});

require __DIR__.'/auth.php';
