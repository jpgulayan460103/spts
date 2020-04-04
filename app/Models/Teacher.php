<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name',
        'user_id',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
