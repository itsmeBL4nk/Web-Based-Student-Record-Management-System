<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transcript extends Model
{
    use HasFactory;
    public $table = 'transcripts';
    
    protected $fillable =[
        'reason', 
        'other_reason'
    ];
    public function student()
        {
            return $this->belongsTo('App\Models\Student', 'stud_ID');
        }
}
