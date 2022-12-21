<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreExamRequest;
use App\Http\Requests\Admin\StoreStudentToClassroomRequest;
use App\Models\Classroom;
use App\Models\Exam;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{
    public function create()
    {
        $students = User::student()->pluck('full_name', 'id')->all();
        $classrooms = Classroom::pluck('name', 'id')->all();

        return view('admin.exams.create', compact('students', 'classrooms'));
    }

    public function store(StoreExamRequest $request)
    {
        $exam = Exam::create([
            'classroom_id' => $request->input('classroom_id')
        ]);

        DB::table('exam_results')->insert([
            'exam_id' => $exam->id,
            'student_id' => $request->input('student_id'),
            'score' => $request->input('score'),
        ]);

        return redirect()->route('exams');
    }
}
