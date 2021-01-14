<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\NameRule;

class StudentCreateRequest extends FormRequest
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
            'last_name' => ['required','max:191', new NameRule],
            'first_name' => ['required','max:191', new NameRule],
            // 'middle_name' => ['required','max:191', new NameRule],
            // 'ext_name' => ['required','max:191', new NameRule],
            'gender' => ['required','max:191', new NameRule],
            'guardian_name' => ['max:191', new NameRule],
            // 'guardian_contact_number' => ['max:191', new NameRule],
            'student_id_number' => ['required','unique:students,student_id_number'],
            'username' => ['required','unique:users,username'],
            'password' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'student_id_number.unique' => 'The student id number has been added.'
        ];
    }
}
