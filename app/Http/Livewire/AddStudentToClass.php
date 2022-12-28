<?php

namespace App\Http\Livewire;

use App\Models\Classroom;
use App\Models\ClassYear;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddStudentToClass extends Component
{
    public $classrooms;
    public $students;
    public $classYears;
    public $student_id;
    public $classroom_id;
    public $class_year_id;

    public function mount()
    {
        $this->classYears = ClassYear::all();

        $this->students = collect();

        $locale = app()->getLocale();
        $this->classrooms = Classroom::with('lesson')
            ->select('id', 'lesson_id', 'name_'. $locale)
            ->orderBy('name_'. $locale)
            ->get();
    }

    public function updatedStudent($classYearId)
    {
        $this->students = User::student()
            ->orderBy('full_name')
            ->where('class_year_id', $classYearId)
            ->pluck('full_name', 'id');
    }

    public function rules()
    {
        return [
            'student_id' => ['required'],
            'classroom_id' => ['required'],
        ];
    }

    public function store()
    {
        $this->validate();

        $query = DB::table('classroom_student')
            ->where('classroom_id', $this->classroom_id)
            ->where('student_id', $this->student_id)
            ->first();

        if ($query) {
            return back()->with('error_msg', 'Student already exist!');
        }

        DB::table('classroom_student')->insert([
            'classroom_id' => $this->classroom_id,
            'student_id' => $this->student_id,
        ]);

        return redirect()->route('students');
    }

    public function render()
    {
        if ($this->class_year_id != null) {
            $this->updatedStudent($this->class_year_id);
        } else {
            $this->students = collect();
        }

        return view('livewire.add-student-to-class');
    }
}
