<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gradelevel extends Model
{
    use HasFactory;

    

    //relationship with classtype
    
    public function classes(){
        return $this->hasMany('App\Models\Classes', 'gradelevel_id');
    }

    public function student(){
        return $this->hasMany('App\Models\Student', 'gradeLevel_id');
    }
    public function subteacher(){
        return $this->hasMany('App\Models\Subteacher', 'gradelevels_id');
    }
}
