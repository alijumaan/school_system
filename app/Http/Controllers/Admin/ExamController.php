<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreExamRequest;
use App\Models\Classroom;
use App\Models\Exam;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{
    public function create()
    {
        $students = User::student()
            ->orderBy('full_name')
            ->pluck('full_name', 'id')
            ->all();

        $classrooms = Classroom::with('lesson')
            ->select('id', 'lesson_id', 'name')
            ->orderBy('name')
            ->get();

        return view('admin.exams.create', compact('students', 'classrooms'));
    }

    public function store(StoreExamRequest $request)
    {
        $classroom = DB::table('classroom_student')
            ->where('classroom_id', $request->input('classroom_id'))
            ->where('student_id', $request->input('student_id'))
            ->first();

        if (!$classroom) {
            return back()->with('status', 'Student does not exist in this classroom!');
        }

        $exam = Exam::find($request->input('classroom_id'));

        $examResult = DB::table('exam_results')
            ->where('exam_id', $exam->id)
            ->where('student_id', $request->input('student_id'))
            ->first();

        if ($examResult) {
            return back()->with('status', 'Student\'s exam already exist!');
        }

        $exam = Exam::firstOrCreate([
            'classroom_id' => $request->input('classroom_id')
        ]);

        DB::table('exam_results')->insert([
            'exam_id' => $exam->id,
            'student_id' => $request->input('student_id'),
            'score' => $request->input('score'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('exams');
    }
}
