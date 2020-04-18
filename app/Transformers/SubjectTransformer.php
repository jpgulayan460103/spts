<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Transformers\TrackTransformer;
use App\Transformers\QuarterTransformer;
use App\Transformers\SemesterTransformer;
use App\Transformers\TeacherTransformer;
use App\Transformers\SubjectCategoryTransformer;

class SubjectTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        'track',
        'semester',
        'subject_category',
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'quarter',
        'teacher',
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
            'track_id' => $table->track_id,
            'quarter_id' => $table->quarter_id,
            'semester_id' => $table->semester_id,
            'teacher_id' => $table->teacher_id,
            'subject_category_id' => $table->subject_category_id,
            'subject_description' => $table->subject_description,
            'school_year' => $table->school_year,
            'offer_code' => $table->offer_code,
            'subject_code' => $table->subject_code,
            'grade_level' => $table->grade_level,
            'section_adviser' => $table->section_adviser,
            'section_name' => $table->section_name,
            'section_strand' => $table->section_strand,
            'room_number' => $table->room_number,
            'subject_coordinator' => $table->subject_coordinator,
        ];
    }

    public function includeTrack($table)
    {
        if($table->track){
            return $this->item($table->track, new TrackTransformer);
        }
    }
    public function includeQuarter($table)
    {
        if($table->quarter){
            return $this->item($table->quarter, new QuarterTransformer);
        }
    }
    public function includeSemester($table)
    {
        if($table->semester){
            return $this->item($table->semester, new SemesterTransformer);
        }
    }
    public function includeTeacher($table)
    {
        if($table->teacher){
            return $this->item($table->teacher, new TeacherTransformer);
        }
    }
    public function includeSubjectCategory($table)
    {
        if($table->subject_category){
            return $this->item($table->subject_category, new SubjectCategoryTransformer);
        }
    }
}
