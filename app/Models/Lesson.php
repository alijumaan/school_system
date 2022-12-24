<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'title_en',
        'title_ar',
        'short_name',
        'description_en',
        'description_ar',
    ];
}
