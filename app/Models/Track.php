<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $fillable = [
        'track_name',
        'written_work',
        'performance_task',
        'quarterly_exam',
    ];
}
