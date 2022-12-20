<?php

use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\ExamController;
use Illuminate\Support\Facades\Route;

Route::middleware(['admin'])->group(function () {

    Route::controller(StudentController::class)->group(function () {
        Route::get('students/create', 'create')->name('students.create');
    });

    Route::controller(ExamController::class)->group(function () {
        Route::get('exams/create', 'create')->name('exams.create');
    });

});
