<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
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
    ];

    protected function role():Attribute
    {
        return new Attribute(
            get: fn($value)=>["student", "teacher", "admin"][$value],
        );
        
    }

    //  //relationship with teachers
    //  public function teachers(){
    //     return $this->hasMany(Teacher::class, 'user_id');
    // }

    // //relationship with students
    // public function students(){
    //     return $this->hasMany(Student::class, 'user_id');
    // }
    
    protected $guarded = [];

    public function teacher(){
        return $this->belongsTo('App\Models\Teacher', 'teacher_id');
    }
    public function student(){
        return $this->belongsTo('App\Models\Student', 'student_id');
    }
}
