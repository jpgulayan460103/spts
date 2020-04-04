<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'student_id_number',
        'first_name',
        'middle_name',
        'last_name',
        'ext_name',
        'gender',
        'guardian_name',
        'guardian_contact_number',
        'class_section_id',
        'user_id',
    ];

    public function class_section()
    {
        return $this->belongsTo('App\Models\ClassSection');
    }
}
