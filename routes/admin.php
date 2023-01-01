<?php

use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\ClassroomController;
use Illuminate\Support\Facades\Route;

Route::middleware(['admin'])->group(function () {

    Route::controller(StudentController::class)->group(function () {
        Route::get('students/create', 'create')->name('students.create');
    });

    Route::controller(ExamController::class)->group(function () {
        Route::get('exams/create', 'create')->name('exams.create');
    });

    Route::controller(ClassroomController::class)->group(function () {
        Route::get('classrooms/create', 'create')->name('classrooms.create');
    });

});
