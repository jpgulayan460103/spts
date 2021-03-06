<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassSectionCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'school_year' => 'required|max:191',
            'section_name' => 'required|max:191',
            'track_id' => 'required|max:191',
            'teacher_id' => 'required|max:191',
            'grade_level' => 'required|max:191',
            'semester_id' => 'required|max:191',
            'quarter_id' => 'required|max:191',
        ];
    }
}
