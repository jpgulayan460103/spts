<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class ScoreTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
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
            'score_item_id' => $table->score_item_id,
            'subject_id' => $table->subject_id,
            'student_id' => $table->student_id,
            'class_section_id' => $table->class_section_id,
            'grading_system_id' => $table->grading_system_id,
            'grade_id' => $table->grade_id,
            'score' => (integer)$table->score,
        ];
    }
}
