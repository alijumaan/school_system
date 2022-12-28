<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function create()
    {
        return view('admin.students.addToClassroom');
    }
}
