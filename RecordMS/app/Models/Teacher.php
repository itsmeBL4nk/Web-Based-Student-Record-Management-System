<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;


    //relationship with classtype

    public function classes(){
        return $this->hasOne('App\Models\Classes', 'teach_id');
    }
    public function subteacher()
    {
        return $this->hasMany('App\Models\Subteacher', 'teacher_ID');
    }
    protected static function boot()
    {
        parent::boot();

        static::created(function ($teacher){
            $teacher->user()->create([
                'email'=>$teacher->email,
                'username'=>$teacher->username,
                'role'=>$teacher->role,
                'password'=>$teacher->password,
            ]);
        });
    }
    public function user(){
        return $this->hasOne('App\Models\User', 'teacher_id');
    }
    // public function grade()
    // {
    //     return $this->hasMany('App\Models\Grade', 'teacher_ID');
    // }
    

}
