<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreStudentToClassroomRequest;
use App\Models\Classroom;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function create()
    {
        $students = User::student()
            ->pluck('full_name', 'id')
            ->all();

        $locale = app()->getLocale();

        $classrooms = Classroom::with('lesson')
            ->select('id', 'lesson_id', 'name_'. $locale)
            ->orderBy('name_'. $locale)
            ->get();

        return view('admin.students.addToClassroom', compact('students', 'classrooms'));
    }

    public function store(StoreStudentToClassroomRequest $request)
    {
        $query = DB::table('classroom_student')
            ->where('classroom_id', $request->input('classroom_id'))
            ->where('student_id', $request->input('student_id'))
            ->first();

        if ($query) {
            return back()->with('error_msg', 'Student already exist!');
        }

        DB::table('classroom_student')->insert([
            'classroom_id' => $request->input('classroom_id'),
            'student_id' => $request->input('student_id'),
        ]);

        return redirect()->route('students');
    }
}
