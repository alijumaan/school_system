<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function create()
    {
        $students = User::student()->pluck('full_name', 'id')->all();
        $classrooms = Classroom::pluck('name', 'id')->all();

        return view('admin.students.addToClassroom', compact('students', 'classrooms'));
    }

    public function store(Request $request)
    {
        DB::table('classroom_student')->insert([
            'classroom_id' => $request->classroom_id,
            'student_id' => $request->student_id,
        ]);

        return redirect()->route('students');
    }
}
