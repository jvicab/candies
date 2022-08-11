<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Rules\UnsignedInteger;
use App\Rules\FileName;

class CandyBarRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'user_id' => ['required', new UnsignedInteger],
            'image'   => ['required', new FileName],
            'name'    => 'required',
            'rating'  => ['nullable', new UnsignedInteger, 'min:1', 'max:5'],
        ];
    }
}
