<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransmutedGrade extends Model
{
    protected $fillable = [
        'grade',
        'transmuted_grade'
    ];
}
