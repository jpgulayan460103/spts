<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassSection extends Model
{
    protected $fillable = [
        'section_name',
        'track_id',
        'section_adviser',
        'grade_level',
        'school_year',
    ];

    public function track()
    {
        return $this->belongsTo('App\Models\Track');
    }
}
