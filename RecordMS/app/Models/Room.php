<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function schedule(){
        return $this->hasMany('App\Models\Schedule', 'room_id');
    }

}
