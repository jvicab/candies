<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class FileName implements Rule
{
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        return (bool)preg_match('/^[^\\/?*:;{}\\\\]+$/', $value);
    }

    public function message()
    {
        return 'The :attribute must be a valid filename.';
    }
}
