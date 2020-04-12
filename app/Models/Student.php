<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public static function boot() {
        parent::boot();
    
        static::creating(function (Student $item) {
            $item->full_name_first = "$item->first_name $item->middle_name $item->last_name $item->ext_name";
            $item->full_name_last = "$item->last_name, $item->first_name $item->middle_name $item->ext_name";
        });
    
        static::updating(function (Student $item) {
            $item->full_name_first = "$item->first_name $item->middle_name $item->last_name $item->ext_name";
            $item->full_name_last = "$item->last_name, $item->first_name $item->middle_name $item->ext_name";
        });
    }
    protected $fillable = [
        'student_id_number',
        'first_name',
        'middle_name',
        'last_name',
        'ext_name',
        'gender',
        'guardian_name',
        'guardian_contact_number',
    ];

    public function class_sections()
    {
        return $this->belongsToMany('App\Models\ClassSection','section_students','student_id','class_section_id');
    }

    public function user()
    {
        return $this->morphOne('App\Models\User','userable');
    }
}
