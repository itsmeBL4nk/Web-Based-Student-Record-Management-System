<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    // public function schedule(){
    //     return $this->hasMany('App\Models\Schedule', 'subject_id');
    // }
    public function subteacher()
    {
        return $this->hasMany('App\Models\Subteacher', 'subject_ID');
    }
    // public function semester()
    // {
    //     return $this->belongsTo('App\Models\Semester', 'semester_ID');
    // }
    // public function classes()
    // {
    //     return $this->belongsTo('App\Models\Classes', 'class_ID');
    // }

}
