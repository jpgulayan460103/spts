<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class TeacherTransformer extends TransformerAbstract
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
            'teacher_id_number' => $table->teacher_id_number,
            'full_name_last' => $table->full_name_last,
            'full_name_first' => $table->full_name_first,
            'first_name' => $table->first_name,
            'middle_name' => $table->middle_name,
            'last_name' => $table->last_name,
            'ext_name' => $table->ext_name,
            'gender' => $table->gender,
        ];
    }
}
