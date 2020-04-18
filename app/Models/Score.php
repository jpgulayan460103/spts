<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = [
        'score_item_id',
        'subject_id',
        'student_id',
        'class_section_id',
        'grading_system_id',
        'grade_id',
        'score',
    ];

    public function score_item()
    {
        return $this->belongsTo('App\Models\ScoreItem');
    }
    public function subject()
    {
        return $this->belongsTo('App\Models\Subject');
    }
    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }
    public function grade()
    {
        return $this->belongsTo('App\Models\Grade');
    }
    public function class_section()
    {
        return $this->belongsTo('App\Models\ClassSection');
    }
    public function grading_system()
    {
        return $this->belongsTo('App\Models\GradingSystem');
    }
}
