<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScoreItem extends Model
{
    protected $fillable = [
        'subject_id',
        'subject_category_id',
        'class_section_id',
        'item',
    ];
}
