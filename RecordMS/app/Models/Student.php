<?php

namespace App\Models;

use App\Models\Grade;
use App\Models\Subteacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($student){
            $student->user()->create([
                'lrn'=>$student->lrn,
                'lname'=>$student->lname,
                'fname'=>$student->fname,
                'mid_name'=>$student->mid_name,
                'email'=>$student->email,
                'role'=>$student->role,
                'password'=>$student->password,
            ]);
            $subj=Subteacher::where('class_ID', $student->classes_id)->get();
            foreach($subj as $subs){
                $grade = new Grade();
                $grade->subjectteacher_id = $subs->id;
                $grade->lrn = $student->lrn;
                $grade->sub_name = $subs->subject->sub_name;
                $grade->sub_type = $subs->subject->sub_type;
                $grade->school_yr = $subs->classes->schoolyear->schoolyear;
                $grade->semester = $subs->sem;
                $grade->save();
            }
        });
    }
    public function user(){
        return $this->hasOne('App\Models\User', 'student_id');
    }
    

// relationship to section
    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }

// relationship to strand
    public function strand()
    {
        return $this->belongsTo('App\Models\Strand', 'strand_id');
    }

    public function gradelevel()
    {
        return $this->belongsTo('App\Models\Gradelevel', 'gradeLevel_id');
    }
    public function subteacher()
    {
        return $this->belongsTo(Subteacher::class);
    }
    public function classes()
    {
        return $this->belongsTo(Classes::class, 'classes_id');
    }
    public function preenrollment()
    {
        return $this->hasOne('App\Models\Preenrollment', 'stud_id');
    }
    public function transcript()
    {
        return $this->hasOne('App\Models\Transcript', 'stud_ID');
    }
    public function grade()
    {
        return $this->hasMany(Grade::class);
    }
    
    

}
