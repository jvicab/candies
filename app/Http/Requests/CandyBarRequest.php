<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Rules\UnsignedInteger;
use App\Rules\FileName;
use App\Rules\Rating;

class CandyBarRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'user_id' => ['nullable', new UnsignedInteger],
            'image'   => ['required', new FileName],
            'name'    => 'required',
            'rating'  => ['nullable', new Rating],
        ];
    }
}
