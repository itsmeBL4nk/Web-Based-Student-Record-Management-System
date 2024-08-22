<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacherschedule extends Model
{
    use HasFactory;

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher', 'techr_id');
    }
    public function schedule()
    {
        return $this->belongsTo('App\Models\Schedule', 'schedule_id');
    }
}
