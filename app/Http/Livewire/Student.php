<?php

namespace App\Http\Livewire;

use App\Models\ClassYear;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Student extends Component
{
    use WithPagination;

    public $class_year_id;
    public object $classYears;

    public function mount()
    {
        $this->classYears = ClassYear::all();
    }

    public function render()
    {
        $locale = app()->getLocale();

        $students = User::student()
            ->join('classroom_student', 'classroom_student.student_id', '=', 'users.id')
            ->join('class_years', 'class_years.id', '=', 'users.class_year_id')
            ->join('classrooms', 'classrooms.id', '=', 'classroom_student.classroom_id')
            ->join('lessons', 'lessons.id', '=', 'classrooms.lesson_id')
            ->select(
                'users.*',
                'classrooms.name_'. $locale .' as classroom',
                'lessons.title_'. $locale .' as lesson',
                'class_years.title_'. $locale .' as class_year'
            )
            ->when($this->class_year_id != null, function ($query) {
                $query->where('users.class_year_id', $this->class_year_id);
            })
            ->orderBy('classroom')
            ->orderBy('lesson')
            ->paginate();

        return view('livewire.student', [
            'students' => $students,
        ]);
    }
}
