<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\RoleEnum;
use Carbon\Carbon;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, MustVerifyEmail;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cne',
        'full_name',
        'email',
        'birth_date',
        'phone',
        'class_year_id',
        'age',
        'national_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birth_date' => 'date',
        'role_id' => RoleEnum::class,
    ];

//    public function setBirthDateAttribute($value)
//    {
//        if ($value != null) {
//            $this->attributes['birth_date'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
//        }
//    }

    public function getBirthDateAttribute(): string
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['birth_date'])->format('m/d/Y');
    }

    public function classrooms(): BelongsToMany
    {
        return $this->belongsToMany(Classroom::class, 'classroom_student', 'student_id', 'classroom_id');
    }

    public function scopeStudent()
    {
        return $this->where('role_id', RoleEnum::STUDENT->value);
    }

    public function scopeTeacher()
    {
        return $this->where('role_id', RoleEnum::TEACHER->value);
    }

    public function isAdmin(): bool
    {
        return auth()->user()->role_id->value === RoleEnum::ADMIN->value;
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($user) {
            $user->cne = 'STU-' . rand(000001, 9999999);
        });
    }
}
