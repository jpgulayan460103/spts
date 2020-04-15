<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class GradingSystemTransformer extends TransformerAbstract
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
            'category' => $table->category,
            'grading_system' => $table->grading_system,
            'subject_category_id' => $table->subject_category_id,
        ];
    }
}
