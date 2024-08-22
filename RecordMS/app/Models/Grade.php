<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;

class Grade extends Model
{
    use CascadesDeletes;
    use HasFactory;

    public function subteacher()
    {
        return $this->belongsTo('App\Models\Subteacher', 'subjectteacher_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    protected $casts = [
        'qrtr_one' => 'integer',
    ];
    
}
