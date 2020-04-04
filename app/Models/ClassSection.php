<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassSection extends Model
{
    protected $fillable = [
        'section_name',
        'section_strand',
        'section_adviser',
        'grade_level',
    ];
}
