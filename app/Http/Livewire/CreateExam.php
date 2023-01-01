<?php

namespace App\Http\Livewire;

use App\Models\Exam;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateExam extends Component
{
    public $students;
    public $classrooms;
    public $student_id;
    public $classroom_id;
    public $score;

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

    public function rules()
    {
        return [
            'student_id' => ['required'],
            'classroom_id' => ['required'],
            'score' => ['required', 'integer', 'min:0', 'max:100'],
        ];
    }

    public function store()
    {
        $this->validate();

        $query = DB::table('exams')
            ->join('classrooms', 'classrooms.id', '=', 'exams.classroom_id')
            ->join('lessons', 'lessons.id', '=', 'classrooms.lesson_id')
            ->join('classroom_student', 'classrooms.id', '=', 'classroom_student.classroom_id')
            ->where('classroom_student.classroom_id', $this->classroom_id)
            ->where('classroom_student.student_id', $this->student_id)
            ->first();

        if ($query) {
            return back()->with('error_msg', 'Test result is preset for this student');
        }

        $exam = Exam::find($this->classroom_id);

        if ($exam) {
            $examResult = DB::table('exam_results')
                ->where('exam_id', $exam->id)
                ->where('student_id', $this->student_id)
                ->first();

            if ($examResult) {
                return back()->with('status', 'Student\'s exam already exist!');
            }
        }

        $exam = Exam::firstOrCreate([
            'classroom_id' => $this->classroom_id
        ]);

        DB::table('exam_results')->insert([
            'exam_id' => $exam->id,
            'student_id' => $this->student_id,
            'score' => $this->score,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('exams');
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
