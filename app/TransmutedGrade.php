<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransmutedGrade extends Model
{
    protected $fillable = [
        'grade',
        'transmuted_grade'
    ];
}
