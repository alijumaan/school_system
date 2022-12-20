<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index(): View
    {
        $students = User::student()
            ->join('classroom_student', 'classroom_student.student_id', '=', 'users.id')
            ->join('classrooms', 'classrooms.id', '=', 'classroom_student.classroom_id')
            ->join('lessons', 'lessons.id', '=', 'classrooms.lesson_id')
            ->select('users.*', 'classrooms.name as classroom', 'lessons.title as lesson')
            ->orderBy('classroom')
            ->paginate();

        return view('students', compact('students'));
    }
}
