<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ExamController extends Controller
{
    public function index(): View
    {
        return view('exams');
    }
}
