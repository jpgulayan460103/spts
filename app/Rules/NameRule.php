<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NameRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (! is_string($value) && is_numeric($value)) {
            return false;
        }

        if(trim($value) == ""){
            return true;
        }else{
            return preg_match('/^[\pL\pM_ _-]+$/u', $value) > 0;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Dash (-) is the only special characters allowed.';
    }
}
