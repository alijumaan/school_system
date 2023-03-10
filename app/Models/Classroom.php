<?php

namespace App\Models;

use App\Enums\RoleEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Classroom extends Model
{
    protected $fillable = [
        'name_en',
        'name_ar',
        'location',
        'lesson_id',
        'class_year_id',
        'teacher_id',
    ];

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'classroom_student', 'classroom_id', 'student_id');
    }

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }

    public function classYear(): BelongsTo
    {
        return $this->belongsTo(ClassYear::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class)->where('role_id', RoleEnum::TEACHER->value);
    }
}
