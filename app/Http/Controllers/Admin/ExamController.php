<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\User;

class ExamController extends Controller
{
    public function create()
    {
        $students = User::student()
            ->orderBy('full_name')
            ->pluck('full_name', 'id')
            ->all();

        $locale = app()->getLocale();

        $classrooms = Classroom::with('lesson')
            ->select('id', 'lesson_id', 'name_'. $locale)
            ->orderBy('name_'. $locale)
            ->get();

        return view('admin.exams.create', compact('students', 'classrooms'));
    }
}
