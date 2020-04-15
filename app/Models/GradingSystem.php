<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradingSystem extends Model
{
    protected $fillable = [
        'category',
        'grading_system',
        'subject_category_id',
    ];

    public function subject_category()
    {
        return $this->belongsTo('App\Models\SubjectCategory');
    }
}
