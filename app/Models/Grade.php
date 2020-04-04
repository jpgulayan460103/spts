<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
        'subject_id',
        'student_id',
        'subject_type',
        'grade',
    ];
    public function subject()
    {
        return $this->belongsTo('App\Models\Subject');
    }
    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }
}
