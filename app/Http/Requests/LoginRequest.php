<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;

class LoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'string',
                'min:5',
                'max:255',
                'email',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:255',
            ]
        ];
    }
}
