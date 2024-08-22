<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    
        public function student()
        {
            return $this->hasOne('App\Models\Student', 'section_id');
        }

    

    public function classes(){
        return $this->hasOne('App\Models\Classes', 'section_id');
    }

    public function subteacher(){
        return $this->hasMany('App\Models\Subteacher', 'sections_id');
    }
    

    

        

    
}
