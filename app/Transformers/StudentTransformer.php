<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Transformers\ClassSectionTransformer;

class StudentTransformer extends TransformerAbstract
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
            'student_id_number' => $table->student_id_number,
            'full_name_last' => $table->full_name_last,
            'full_name_first' => $table->full_name_first,
            'first_name' => $table->first_name,
            'middle_name' => $table->middle_name,
            'last_name' => $table->last_name,
            'ext_name' => $table->ext_name,
            'gender' => $table->gender,
            'guardian_name' => $table->guardian_name,
            'guardian_contact_number' => $table->guardian_contact_number,
        ];
    }

    public function includeClassSections($table)
    {
        if($table->class_sections){
            return $this->collection($table->class_sections, new ClassSectionTransformer);
        }
    }
}
