<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectionStudent extends Model
{
    protected $fillable = [
        'student_id',
        'class_section_id',
    ];
    public function student()
    {
        return $this->belongsTo('App\Models\Student')->orderBy('full_name_last');
    }
    public function class_section()
    {
        return $this->belongsTo('App\Models\ClassSection');
    }
}
