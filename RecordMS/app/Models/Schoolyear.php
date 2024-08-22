<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schoolyear extends Model
{
    use HasFactory;

  

        public function classes(){
            return $this->hasMany('App\Models\Classes', 'schoolyr_id');
        }
        public function subteacher(){
            return $this->hasMany('App\Models\Subteacher', 'schoolyears_id');
        }
}
