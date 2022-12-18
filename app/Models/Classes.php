<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Classes extends Model
{
    protected $fillable = ['lesson_id', 'teacher_id'];

    protected $table = 'classes';

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'class_user', 'class_id', 'student_id');
    }
}
