<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;

class ClassSection extends Model
{
    protected $fillable = [
        'section_name',
        'track_id',
        'teacher_id',
        'grade_level',
        'school_year',
        'semester_id',
        'quarter_id',
    ];

    public function track()
    {
        return $this->belongsTo('App\Models\Track');
    }
    public function students()
    {
        return $this->belongsToMany('App\Models\Student','section_students','class_section_id','student_id')->orderBy('full_name_last');
    }
    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher');
    }
    public function semester()
    {
        return $this->belongsTo('App\Models\Semester');
    }
    public function quarter()
    {
        return $this->belongsTo('App\Models\Quarter');
    }

    public function subjects()
    {
        return Subject::where([
            'track_id' => $this->track_id,
            'semester_id' => $this->semester_id,
            'grade_level' => $this->grade_level,
        ])->get();
    }
}
