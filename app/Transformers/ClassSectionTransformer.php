<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Transformers\TrackTransformer;
use App\Transformers\TeacherTransformer;
use App\Transformers\SemesterTransformer;
use App\Transformers\QuarterTransformer;
use App\Transformers\StudentTransformer;
use App\Transformers\SubjectTransformer;

class ClassSectionTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        'track',
        'semester',
        'quarter',
        'teacher'
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'students',
        'subjects'
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
            'semester_id' => $table->semester_id,
            'quarter_id' => $table->quarter_id,
        ];
    }

    public function includeTrack($table)
    {
        return $this->item($table->track, new TrackTransformer);
    }
    public function includeSemester($table)
    {
        return $this->item($table->semester, new SemesterTransformer);
    }
    public function includeQuarter($table)
    {
        return $this->item($table->quarter, new QuarterTransformer);
    }
    public function includeStudents($table)
    {
        return $this->collection($table->students, new StudentTransformer);
    }
    public function includeTeacher($table)
    {
        return $this->item($table->teacher, new TeacherTransformer);
    }
    public function includeSubjects($table)
    {
        return $this->collection($table->subjects(), new SubjectTransformer);
    }
}
