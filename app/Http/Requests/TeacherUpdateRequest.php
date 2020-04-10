<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\NameRule;

class TeacherUpdateRequest extends FormRequest
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
        $id = request('id');
        return [
            'last_name' => ['required','max:191', new NameRule],
            'first_name' => ['required','max:191', new NameRule],
            'middle_name' => ['required','max:191', new NameRule],
            'ext_name' => ['required','max:191', new NameRule],
            'gender' => ['required','max:191', new NameRule],
            'teacher_id_number' => ['required',"unique:teachers,teacher_id_number,$id"]
        ];
    }

    public function messages()
    {
        return [
            'teacher_id_number.unique' => 'The teacher id number has been added.'
        ];
    }
}
