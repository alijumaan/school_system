<?php

namespace App\Http\Livewire;

use App\Models\ClassYear;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Exam extends Component
{
    use WithPagination;

    public object $classYears;
    public $searchQuery;
    public $class_year_id;

    public function mount()
    {
        $this->classYears = ClassYear::all();

        $this->searchQuery = '';
    }

    public function render()
    {
        $locale = app()->getLocale();

        $exams = User::student()
            ->join('exam_results', 'exam_results.student_id', '=', 'users.id')
            ->join('class_years', 'class_years.id', '=', 'users.class_year_id')
            ->join('exams', 'exams.id', '=', 'exam_results.exam_id')
            ->join('classrooms', 'classrooms.id', '=', 'exams.classroom_id')
            ->join('lessons', 'lessons.id', '=', 'classrooms.lesson_id')
            ->select(
                'users.*',
                'exam_results.score as score',
                'lessons.title_'. $locale .' as lesson',
                'class_years.title_'. $locale .' as class_year'
            )
            ->when($this->searchQuery != '', function ($query) {
                $query->where('users.full_name', 'LIKE', '%' . $this->searchQuery . '%');
            })
            ->when($this->class_year_id != '', function ($query) {
                $query->where('users.class_year_id', $this->class_year_id);
            })
            ->orderBy('score', 'desc')
            ->paginate();

        return view('livewire.exam', [
            'exams' => $exams
        ]);
    }
}
