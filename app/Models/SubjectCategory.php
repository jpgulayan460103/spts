<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectCategory extends Model
{
    protected $fillable = [
        'name'
    ];

    public function grading_systems()
    {
        return $this->hasMany('App\Models\GradingSystem');
    }
}
