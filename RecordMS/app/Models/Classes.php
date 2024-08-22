<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher', 'teach_id');
    }

    public function gradelevel()
    {
        return $this->belongsTo('App\Models\Gradelevel', 'gradelevel_id');
    }

    public function strand()
    {
        return $this->belongsTo('App\Models\Strand', 'strand_id');
    }

    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }

    public function schoolyear()
    {
        return $this->belongsTo('App\Models\Schoolyear', 'schoolyr_id');
    }

    public function schedule(){
        return $this->hasOne('App\Models\Schedule', 'classes_id');
    }
    public function student(){
        return $this->hasMany(Student::class, 'classes_id');
    }
    // public function subject(){
    //     return $this->hasMany('App\Models\Subject', 'class_ID');
    // }
    public function subteacher()
    {
        return $this->hasMany(Subteacher::class, 'class_ID');
    }
    
    

    
}
