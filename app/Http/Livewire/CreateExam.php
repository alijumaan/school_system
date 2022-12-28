<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateExam extends Component
{
    public $students;
    public $classrooms;
    public $student_id;
    public $classroom_id;

    public function mount()
    {
        $this->classrooms = collect();

        $this->students = User::student()->pluck('full_name', 'id');
    }

    public function updatedClassroom($studentId)
    {
        $this->classrooms = DB::table('classroom_student')
            ->join('classrooms', 'classrooms.id', '=', 'classroom_student.classroom_id')
            ->join('lessons', 'lessons.id', '=', 'classrooms.lesson_id')
            ->where('student_id', $studentId)
            ->select('classrooms.id', 'classrooms.name_'. app()->getLocale() . ' as classroom_name', 'lessons.title_'. app()->getLocale() . ' as lesson_title')
            ->get();
    }

    public function render()
    {
        if ($this->student_id != null) {
            $this->updatedClassroom($this->student_id);
        } else {
            $this->classrooms = collect();
        }

        return view('livewire.create-exam');
    }
}
