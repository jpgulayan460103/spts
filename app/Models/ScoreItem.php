<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScoreItem extends Model
{
    protected $fillable = [
        'subject_id',
        'subject_category_id',
        'class_section_id',
        'grading_system_id',
        'item',
        'quiz_name',
        'unit_id',
    ];

    public function scores()
    {
        return $this->hasMany('App\Models\Score');
    }
    
    public function students()
    {
        return $this->hasMany('App\Models\Student');
    }
}
