<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class ScoreItemTransformer extends TransformerAbstract
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
            'subject_id' => $table->subject_id,
            'subject_category_id' => $table->subject_category_id,
            'class_section_id' => $table->class_section_id,
            'grading_system_id' => $table->grading_system_id,
            'item' => (integer)$table->item,
            'quiz_name' => $table->quiz_name,
        ];
    }
}
