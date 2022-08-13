<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Rating implements Rule
{
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        return (bool)preg_match('/^[1-5]+$/', $value);
    }

    public function message()
    {
        return 'The :attribute must be an unsigned integer from 1 to 5.';
    }
}
