<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\RoleEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

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

    public function classes(): BelongsToMany
    {
        return $this->belongsToMany(Classes::class, 'class_user', 'student_id', 'class_id');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($user) {
            $user->cne = 'STU-' . rand(000001, 9999999);
        });
    }
}
