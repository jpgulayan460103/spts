<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Transformers\GradingSystemTransformer;

class SubjectCategoryTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        'grading_systems'
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
            'name' => $table->name,
        ];
    }

    public function includeGradingSystems($table)
    {
        if($table->grading_systems){
            return $this->collection($table->grading_systems, new GradingSystemTransformer);
        }
    }
}
