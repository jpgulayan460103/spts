<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Transformers\ScoreItemTransformer;

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
        'score_item'
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

    public function includeScoreItem($table)
    {
        if($table->score_item){
            return $this->item($table->score_item, new ScoreItemTransformer);
        }
    }
}
