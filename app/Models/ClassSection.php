<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassSection extends Model
{
    protected $fillable = [
        'section_name',
        'track_id',
        'teacher_id',
        'grade_level',
        'school_year',
    ];

    public function track()
    {
        return $this->belongsTo('App\Models\Track');
    }
    public function students()
    {
        // return $this->hasMany('App\Models\SectionStudent');
        return $this->hasMany('App\Models\SectionStudent')
            ->join('students','students.id','=','section_students.student_id')
            ->select('section_students.*')
            ->orderBy('students.full_name_last');
    }
    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher');
    }
}
