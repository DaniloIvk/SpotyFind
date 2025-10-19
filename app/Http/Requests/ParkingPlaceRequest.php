<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;

class ParkingPlaceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
            ],
            'info' => [
                'nullable',
                'string',
                'max:5000',
            ],
            'latitude' => [
                'required',
                'numeric',
                'between:-90,90',
            ],
            'longitude' => [
                'required',
                'numeric',
                'between:-180,180',
            ],
            'total_spots' => [
                'required',
                'integer',
                'min:1',
                'max:9999',
            ],
            'taken_spots' => [
                'sometimes',
                'integer',
                'min:0',
                'lte:total_spots',
            ],
        ];
    }
}
