<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public static function boot() {
        parent::boot();
    
        static::creating(function (Teacher $item) {
            $item->full_name_first = "$item->first_name $item->middle_name $item->last_name $item->ext_name";
            $item->full_name_last = "$item->last_name, $item->first_name $item->middle_name $item->ext_name";
        });
    
        static::updating(function (Teacher $item) {
            $item->full_name_first = "$item->first_name $item->middle_name $item->last_name $item->ext_name";
            $item->full_name_last = "$item->last_name, $item->first_name $item->middle_name $item->ext_name";
        });
    }
    protected $fillable = [
        'teacher_id_number',
        'first_name',
        'middle_name',
        'last_name',
        'ext_name',
        'gender',
    ];
    
    public function user()
    {
        return $this->morphOne('App\Models\User','userable');
    }

    public function class_sections()
    {
        return $this->hasMany('App\Models\ClassSection');
    }
}
