<?php

namespace App\Models;

use App\Models\Classes;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;

class Subteacher extends Model
{
    use CascadesDeletes;
    protected $cascadeDeletes = ['grade'];

    use HasFactory;

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher', 'teacher_ID');
    }
    public function subject()
    {
        return $this->belongsTo('App\Models\Subject', 'subject_ID');
    }
    public function classes()
    {
        return $this->belongsTo(Classes::class, 'class_ID');
    }
    // public function grade()
    // {
    //     return $this->hasOne('App\Models\Section', 'subteacher_id');
    // }
    protected static function boot()
    {
        parent::boot();

        static::created(function ($subteacher){
            $student=Student::where('classes_id', $subteacher->class_ID)->get();
            foreach($student as $students){
                $subteacher->grade()->create([
                    'subjectteacher_id'=>$subteacher->id,
                    'lrn'=>$students->lrn,
                    'sub_name'=>$subteacher->subject->sub_name,
                    'sub_type'=>$subteacher->subject->sub_type,
                    'school_yr'=>$subteacher->classes->schoolyear->schoolyear,
                    'semester'=>$subteacher->sem,
                ]);
            }
            static::bootCascadesDeletes(function($subteacher) {
                foreach ($subteacher as $comment) {
                    $comment->delete();
                }
            });
            
        });
    }
    public function grade()
    {
        return $this->hasMany('App\Models\Grade', 'subjectteacher_id');
    }
    public function student()
    {
        return $this->hasMany(Student::class);
    }
    

}
