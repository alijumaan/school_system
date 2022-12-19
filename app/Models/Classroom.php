<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Classroom extends Model
{
    protected $fillable = ['name', 'location', 'lesson_id', 'teacher_id'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'classroom_user', 'classroom_id', 'student_id');
    }
}
