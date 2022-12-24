<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class ExamController extends Controller
{
    public function index(): View
    {
        $locale = app()->getLocale();

        $exams = User::student()
            ->join('exam_results', 'exam_results.student_id', '=', 'users.id')
            ->join('exams', 'exams.id', '=', 'exam_results.exam_id')
            ->join('classrooms', 'classrooms.id', '=', 'exams.classroom_id')
            ->join('lessons', 'lessons.id', '=', 'classrooms.lesson_id')
            ->select('users.*', 'exam_results.score as score', 'lessons.title_'. $locale .' as lesson')
            ->orderBy('score', 'desc')
            ->paginate();

        return view('exams', compact('exams'));
    }
}
