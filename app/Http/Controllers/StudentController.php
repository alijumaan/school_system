<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index(): View
    {
        $locale = app()->getLocale();

        $students = User::student()
            ->join('classroom_student', 'classroom_student.student_id', '=', 'users.id')
            ->join('class_years', 'class_years.id', '=', 'users.class_year_id')
            ->join('classrooms', 'classrooms.id', '=', 'classroom_student.classroom_id')
            ->join('lessons', 'lessons.id', '=', 'classrooms.lesson_id')
            ->select(
                'users.*',
                'classrooms.name_'. $locale .' as classroom',
                'lessons.title_'. $locale .' as lesson',
                'class_years.title_'. $locale .' as class_year'
            )
            ->orderBy('classroom')
            ->orderBy('lesson')
            ->paginate();

        return view('students', compact('students'));
    }
}
