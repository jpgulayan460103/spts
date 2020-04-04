<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class ClassSectionTransformer extends TransformerAbstract
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
            'section_name' => $table->section_name,
            'section_strand' => $table->section_strand,
            'section_adviser' => $table->section_adviser,
            'grade_level' => $table->grade_level,
        ];
    }
}
