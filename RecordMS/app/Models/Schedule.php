<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher', 'techr_id');
    }

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject', 'subject_id');
    }

    public function timer()
    {
        return $this->belongsTo('App\Models\Timer', 'timer_id');
    }

    public function room()
    {
        return $this->belongsTo('App\Models\Room', 'room_id');
    }

    public function classes()
    {
        return $this->belongsTo('App\Models\Classes', 'classes_id');
    }
    public function day()
    {
        return $this->belongsTo('App\Models\Day', 'day_id');
    }

}
