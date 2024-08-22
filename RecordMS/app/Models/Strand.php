<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strand extends Model
{
    use HasFactory;

    
    public function student()
        {
            return $this->hasOne('App\Models\Student', 'strand_id');
        }
        public function classes(){
            return $this->hasMany('App\Models\Classes', 'strand_id');
        }
        public function subteacher(){
            return $this->hasMany('App\Models\Subteacher', 'strands_id');
        }
        // public function scopeFilter($query, array $filters){

        //     if($filters['strand_name'] ?? false){
        //         $query->where('strand_name', 'like', '%'. request('strand_name'). '%');
        //     }
            
        // }
       

}
