<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Transformers\TrackTransformer;
use App\Transformers\TeacherTransformer;
use App\Transformers\SectionStudentTransformer;

class ClassSectionTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        'track',
        'teacher'
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'students'
    ];
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform($table)
    {
        return [
            'id' => $table->id,
            'section_name' => $table->section_name,
            'track_id' => $table->track_id,
            'teacher_id' => $table->teacher_id,
            'grade_level' => $table->grade_level,
            'school_year' => $table->school_year,
        ];
    }

    public function includeTrack($table)
    {
        return $this->item($table->track, new TrackTransformer);
    }
    public function includeStudents($table)
    {
        return $this->collection($table->students, new SectionStudentTransformer);
    }
    public function includeTeacher($table)
    {
        return $this->item($table->teacher, new TeacherTransformer);
    }
}
