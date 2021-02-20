<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'class_section_id',
        'unit_name',
        'subject_id'
    ];

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject');
    }
}
