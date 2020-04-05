<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class SectionStudentTransformer extends TransformerAbstract
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
        'student',
        'class_section'
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
            'student_id' => $table->student_id,
            'class_section_id' => $table->class_section_id,
        ];
    }

    public function includeStudent($table)
    {
        return $this->item($table->student, new StudentTransformer);
    }
    public function includeClassSection($table)
    {
        return $this->item($table->class_section, new ClassSectionTransformer);
    }
}
