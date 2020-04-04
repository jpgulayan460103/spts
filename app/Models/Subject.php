<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'track_id',
        'quarter_id',
        'semester_id',
        'teacher_id',
        'subject_description',
        'school_year',
        'offer_code',
        'subject_code',
        'grade_level',
        'section_adviser',
        'section_name',
        'section_strand',
        'room_number',
        'subject_coordinator',
    ];

    public function track()
    {
        return $this->belongsTo('App\Models\Track');
    }
    public function quarter()
    {
        return $this->belongsTo('App\Models\Quarter');
    }
    public function semester()
    {
        return $this->belongsTo('App\Models\Semester');
    }
    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher');
    }
    
}
