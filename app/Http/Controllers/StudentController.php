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
            ->join('classrooms', 'classrooms.id', '=', 'classroom_student.classroom_id')
            ->join('lessons', 'lessons.id', '=', 'classrooms.lesson_id')
            ->select('users.*', 'classrooms.name_'. $locale .' as classroom', 'lessons.title_'. $locale .' as lesson')
            ->orderBy('class')
            ->orderBy('classroom')
            ->orderBy('lesson')
            ->paginate();

        return view('students', compact('students'));
    }
}
