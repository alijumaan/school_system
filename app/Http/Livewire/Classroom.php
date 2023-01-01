<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Classroom extends Component
{
    use WithPagination;

    public $searchQuery;

    public function mount()
    {
        $this->searchQuery = '';
    }

    public function render()
    {
        $classrooms = \App\Models\Classroom::with(['lesson', 'teacher'])
            ->select(
            'name_'. app()->getLocale() .' as name',
            'lesson_id',
            'teacher_id'
        )
            ->paginate();

        return view('livewire.classroom', [
            'classrooms' => $classrooms,
        ]);
    }
}
